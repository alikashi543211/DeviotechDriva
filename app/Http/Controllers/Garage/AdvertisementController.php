<?php

namespace App\Http\Controllers\Garage;

use App\Http\Controllers\Controller;
use App\Jobs\SendDiscountEmail;
use App\AdvertisingTransaction;
use Illuminate\Http\Request;
use App\GarageAdvertising;
use App\SavedGarage;
use Carbon\Carbon;
use App\Discount;
use App\Booking;
use App\Service;

// Paypal includes
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Rest\ApiContext;
use PayPal\Api\Transaction;
use PayPal\Api\ItemList;
use PayPal\Api\Payment;
use PayPal\Api\Details;
use PayPal\Api\Payout;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Item;
use Redirect;
use Session;
use Auth;
use URL;

class AdvertisementController extends Controller
{
    private $_api_context;

    public function list()
    {
        $garage = garage();

        $discounts = $garage->discounts;
        $promos = $garage->garage_advertisings->where('status', 'active')->count();

        return view('garage.advertising.list', get_defined_vars());
    }

    public function promoPlans()
    {
        return view('garage.advertising.promo.plans', get_defined_vars());
    }

    public function promoPricing(Request $req)
    {
        $garage = garage();
        $plan = base64_decode($req->p);
        $radius = '';
        if ($plan == "city") {
            $radius = setting('city_radius');
        } else {
            $radius = setting('district_radius');
        }

        $three_days = setting('three_days_price') * $radius;
        $five_days = setting('five_days_price') * $radius;
        $seven_days = setting('seven_days_price') * $radius;

        return view('garage.advertising.promo.pricing', get_defined_vars());
    }

    public function promoOverview(Request $req)
    {
        $plan = base64_decode($req->p);
        $days = base64_decode($req->d);
        $amount = base64_decode($req->a);

        return view('garage.advertising.promo.overview', get_defined_vars());
    }

    public function promoView()
    {
        $garage = garage();
        $promo = $garage->garage_advertisings->where('status', 'active')->first();

        return view('garage.advertising.promo.view', get_defined_vars());
    }

    public function buildpaypal()
    {
        $paypal_conf = [];
        $paypal_conf['client_id'] = env('PAYPAL_CLIENT_ID');
        $paypal_conf['secret'] = env('PAYPAL_SECRET_ID');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret']
        ));
        $paypal_conf = \Config::get('paypal');
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function promoSubmit(Request $req)
    {
        $this->buildpaypal();

        $garage = garage();

        $data['garage_profile_id'] = $garage->id;
        $data['order_no'] = getAdsOrderNo();
        $data['plan'] = base64_decode($req->plan);
        $data['days'] = base64_decode($req->days);
        $data['amount'] = base64_decode($req->amount);
        $data['start_date'] = Carbon::now()->format('d-m-Y');
        $data['end_date'] = Carbon::now()->addDays(base64_decode($req->days))->format('d-m-Y');
        $data['status'] = 'active';

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $item_1 = new Item();
        $item_1->setName('Item 1')
            /** item name **/
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice(base64_decode($req->amount));
        /** unit price **/
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal(base64_decode($req->amount));
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('paypal.status'))
            /** Specify return URL **/
            ->setCancelUrl(URL::route('paypal.status'));
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        /** dd($payment->create($this->_api_context));exit; **/
        try {
            $payment->create($this->_api_context);

        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                return redirect()->back()->with('error', 'Some error occur, sorry for inconvenient');
               // return Redirect::route('user.dashboard')->with('message', 'Connection timeout');
            } else {
                return redirect()->back()->with('error', 'Some error occur, sorry for inconvenient');
               // return Redirect::route('user.dashboard')->with('message', 'Some error occur, sorry for inconvenient');
            }
        }

        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        /** add group ID and station to session **/
        Session::put('advertising', $data);
        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
        Session::put('paypal_detail', $payment);
        if (isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        Session::put('error', 'Unknown error occurred');
        return redirect()->back();
    }

    public function getPayPalStatus(Request $request)
    {
        $this->buildpaypal();
        $garage = garage();

        /** Get the payment and group IDs before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        $data = Session::get('advertising');
        /** clear the session payment and group IDs **/
        Session::forget('paypal_payment_id');
        Session::forget('advertising');

        if (empty($request->input('PayerID')) || empty($request->input('token'))) {
            //return Redirect::route('user.dashboard')->with('message', 'Payment failed');
            return redirect()->back()->with('error', 'Payment failed');
        }

        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));
        /**Execute the payment **/

        $result = $payment->execute($execution, $this->_api_context);
        if ($result->getState() == 'approved') {

            $adv = GarageAdvertising::create($data);

            if ($adv) {
                if($adv->plan == 'district') {
                    $garage->search_radius = setting("district_radius");
                } else if($adv->plan == 'city') {
                    $garage->search_radius = setting("city_radius");
                }
                $garage->is_featured = 1;
                $garage->save();

                AdvertisingTransaction::create([
                    'garage_profile_id' => $garage->id,
                    'garage_advertising_id' => $adv->id,
                    'payment_id' => $payment_id,
                    'amount' => $result->transactions[0]->amount->total,
                    'status' => $result->state,
                ]);
            }

            return redirect()->route('garage.advertising.list')->with('success', 'Your profile is successfully featured!');
        } else {
            return redirect()->back()->with('error','Payment didn\'t go through, Try Again! ');
        }
    }

    public function discountServices()
    {
        $garage = garage();
        return view('garage.advertising.discount.services', get_defined_vars());
    }

    public function discountDetail(Request $req)
    {
        $services = Service::whereIn('id', $req->service_id)->get();
        return view('garage.advertising.discount.detail', get_defined_vars());
    }

    public function discountOverview(Request $req)
    {
        $services = Service::whereIn('id', $req->service_id)->get();
        return view('garage.advertising.discount.overview', get_defined_vars());
    }

    public function discountSubmit(Request $req)
    {
        $services = implode(",", $req->service_id);
        $discount = Discount::create([
            'garage_profile_id' => garage()->id,
            'message' => $req->message,
            'expiry_date' => Carbon::parse($req->expiry_date),
            'services' => $services,
        ]);

        $saved = SavedGarage::where('garage_profile_id', garage()->id)->get();
        $booked = Booking::where('garage_profile_id',garage()->id)->distinct('consumer_profile_id')->get();
        $merged = collect($saved)->merge(collect($booked));
        $followers = $merged->unique('consumer_profile_id')->pluck('consumer_profile_id')->toArray();

        $details = [
            'subject' => garage()->name.' Discount Offer!',
            'discount' => $discount,
            'garage' => garage()->id,
            'followers' => $followers,
        ];

        $job = (new SendDiscountEmail($details))->delay(now()->addSeconds(2));

        dispatch($job);

        return redirect()->route('garage.advertising.list')->with('success', 'Discount Created Successfully!');
    }
}
