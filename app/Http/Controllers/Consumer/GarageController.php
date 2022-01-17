<?php

namespace App\Http\Controllers\Consumer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ConsumerProfile;
use App\GarageProfile;
use App\GarageKeyword;
use DB;
use Carbon\Carbon;
use Auth;
use App\Service;
use App\CustomerFacility;
use App\Booking;
use App\BookingService;
use App\ConsumerVehicle;
use App\User;
use App\Report;
use Session;
use App\Notifications\NewBookingRequest;
use App\GarageProfileView;
use Mail;

class GarageController extends Controller
{
    public function index(Request $req)
    {
        if(!Auth::check())
        {
            return redirect()->route("login.login");
        }
        $messages = [
            'keyword.required' => 'Enter keyword or garage name',
            'location.required' => 'Enter UK Town or Post Code',
        ];
        $rules = [
            'keyword' => ['required'],
            'location' => ['required']
        ];
        $this->validate($req,$rules,$messages);
        
        // $by_location_garages=approved_garages()->where("address","like","%".$req->location."%");
        // $by_location_garages_ids=$by_location_garages->pluck('id')->toArray();

        $by_name_garages=approved_garages()->where("name","like","%".$req->keyword."%");
        $by_name_garages_ids=$by_name_garages->pluck('id')->toArray();
       
        $by_service_garages=approved_garages()->whereHas('garage_services', function($q) use($req){
            $q->whereHas('service', function($q) use($req){
                $q->where('name', 'like', '%'.$req->keyword.'%');
            });
        });
        $by_service_garages_ids=$by_service_garages->pluck('id')->toArray();

        $by_keyword_garages=approved_garages()->whereHas('garage_keywords', function($q) use($req){
            $q->where('keyword', 'like', '%'.$req->keyword.'%');
        });
        $by_keyword_garages_ids=$by_keyword_garages->pluck('id')->toArray();
        
        $by_customer_facility_garages=approved_garages()->whereHas('garage_customer_facilities', function($q) use($req){
            $by_keyword_garages_child=$q->whereHas('customer_facility', function($q) use($req){
                $q->where('name', 'like', '%'.$req->keyword.'%');
            });
        });
        $by_customer_facility_garages_ids=$by_customer_facility_garages->pluck('id')->toArray();

        $garage_ids = array_unique (array_merge($by_name_garages_ids,$by_service_garages_ids,$by_keyword_garages_ids,$by_customer_facility_garages_ids));
        
        $garages=approved_garages()->whereIn('id',$garage_ids)->where("address","like","%".$req->location."%")->get();
        return view("consumer.garages.index",get_defined_vars());
    }

    function fetch_keywordlist(Request $request)
    {

        if($request->get('query'))
        {
            $query = $request->get('query');
            $garage_profiles = GarageProfile::where('name', 'LIKE', "{$query}%")->where("status","approved")
            ->get();
            $services = Service::where('name', 'LIKE', "{$query}%")
            ->get();
            $garage_keywords = GarageKeyword::select("keyword")->where('keyword', 'LIKE', "{$query}%")
            ->distinct()->get();
            $facilities = CustomerFacility::where('name', 'LIKE', "{$query}%")
            ->get();
            return view("consumer.ajax.load_keyword_list",get_defined_vars());
        }
    }


    public function fetch_locationlist(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $locations = GarageProfile::where('address', 'LIKE', "{$query}%")->orWhere("uk_postcode",$query)
            ->get();
            return view("consumer.ajax.load_location_list",get_defined_vars());
        }
    }

    public function loadKeywordList()
    {
        return view('consumer.ajax.load_keyword_list', get_defined_vars());
    }

    public function garageDetail(Request $request,$id)
    {
        $garage=GarageProfile::find($id);
        $visitor = GarageProfileView::where('ip', $request->ip())->whereDay('created_at', Carbon::today())->first();
            if ($visitor) {
                $visitor->no_of_views++;
                $visitor->save();
            } else {
                $visitor = new GarageProfileView();
                $visitor->garage_profile_id=$garage->id;
                $visitor->ip = $request->ip();
                $visitor->agent = $request->header('User-Agent');
                $visitor->no_of_views = 1;
                $visitor->save();
            }
      return view("consumer.garages.garage_detail",get_defined_vars());
    }
    public function bookGarage($id)
    {
        $garage_id=$id;
        $selected_service = [];
        $garage_serivce_ids=[];
        $garage=GarageProfile::find($id);
        $garage_services=$garage->garage_services;
        foreach($garage_services as $gs)
        {
            $garage_serivce_ids[]=$gs->service_id;
        }
        $vehicles=consumer()->consumer_vehicles;
        $services=Service::whereIn("id",$garage_serivce_ids)->get();
        return view("consumer.garages.book_garage", get_defined_vars());
    }

    public function saveBooking(Request $request)
    {
        $request->validate([
        'services' => 'required|array|min:1',
        'consumer_vehicle_id' => 'required|numeric|min:1',
        'description' => 'required'
        ]);
        $bk=new Booking();
        $bk->consumer_vehicle_id=$request->consumer_vehicle_id;
        $bk->consumer_profile_id=$request->consumer_profile_id;
        $bk->garage_profile_id=$request->garage_profile_id;
        $bk->description=$request->description;
        $bk->save();
        $booking_id=$bk->id;
        foreach($request->services as $sid)
        {
        $bs=new BookingService();
        $bs->booking_id=$booking_id;
        $bs->service_id=$sid;
        $bs->save();
        }
        $garage_name=$bk->garage_profile_info->name;
            // $msg="Your booking request with ".$garage_name." has been sent";
        $msg=" Your booking has started";
        $details = [
        'booking_id' => $bk->id,
        'garage_name' => $garage_name,
        'msg' => 'Your booking request with '.$garage_name.' has been sent'
        ];
        $garage_user=$bk->garage_profile_info->user;
        Auth::user()->notify(new NewBookingRequest($details));
        $details2 = [
        'booking_id' => $bk->id,
        'garage_name' => $garage_name,
        'msg' => 'You have recieved booking request from consumer '.auth()->user()->name,
        ];
        $garage_user->notify(new NewBookingRequest($details2));
        // email send
        $user=consumer()->user;
        $consumer_name=$user->name;
        Mail::send('emails.consumer.booking_request',['user' => $user,'garage_name'=>$garage_name], function ($send) use($user){
            $send->to($user['email'])->subject('Your booking request');
        });
        Mail::send('emails.garage.booking_request',['user' => $garage_user,'consumer_name'=>$consumer_name], function ($send) use($garage_user){
            $send->to($garage_user['email'])->subject('Booking Request');
        });
        return redirect()->route("consumer.booking.pending",['booking'=>$bk->id])->with('success',$msg);
    }

    }