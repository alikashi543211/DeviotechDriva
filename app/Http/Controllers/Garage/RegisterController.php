<?php

namespace App\Http\Controllers\Garage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\User;
use App\Service;
use App\PaymentType;
use App\GarageImage;
use App\GarageProfile;
use App\GarageService;
use App\GarageKeyword;
use App\CustomerFacility;
use App\GaragePaymentType;
use App\GarageCustomerFacility;
use App\WorkingHour;
use Session;
use App\Rules\FirstNameRule;
use App\Rules\LastNameRule;
use App\Rules\PasswordRule;
use App\Rules\WebsiteUrlRule;
use App\Rules\ContactNumberRule;
use App\Rules\ContactTwoRule;
use App\Rules\CompanyRegNoRule;
use App\Rules\VatNoRule;
use Mail;
use App\Notifications\RegisterUser;

class RegisterController extends Controller
{
    public function redirection(Request $req)
    {
        $garage = garage();
        if ($garage->registration_step == "garage_profile") {
            return redirect()->route('garage.application.contact_info')->with('success',$req->msg);
        } elseif ($garage->registration_step == "services_and_facilities") {
            return redirect()->route('garage.application.description')->with('success',$req->msg);
        } elseif ($garage->registration_step == "working_hours") {
            return redirect()->route('garage.application.working_hours')->with('success',$req->msg);
        } elseif ($garage->registration_step == "gallery") {
            return redirect()->route('garage.application.gallery')->with('success',$req->msg);
        } elseif ($garage->registration_step == "done"){
            return redirect()->route('garage.application.overview')->with('success',$req->msg);
        }
    }

    public function personalInfo()
	{
		return view('garage.garage_register');
	}

    public function savePersonalInfo(Request $req)
    {
         $messages = [
            'garage_name.required' => 'Enter your garage name',
            'first_name.required' => 'Enter your first name',
            'last_name.required' => 'Enter your last name',
            'email.required' => 'Enter your email address',
            'email.email' => 'Enter a valid email address',
            'password.required' => 'Enter your password',
            'password.confirmed' => 'Confirm your password',
            'password.min' => 'Enter a stronger password',
            'g-recaptcha-response.required' => 'Verify Google Recaptcha',
            'g-recaptcha-response.captcha' => 'Verify Google Recaptcha'

        ];
        $rules = [
            'garage_name' => 'required|min:2|max:50',
            'first_name' => ['required','string','max:95',new FirstNameRule()],
            'last_name' => ['required','string','max:95',new LastNameRule()],
            'email' => 'required|email' . (!authCheck() ? '|unique:users' : ''),
            'password' => ['required','min:6','confirmed',new PasswordRule()],
            'g-recaptcha-response' => 'required|captcha'
        ];

         $this->validate($req,$rules,$messages);
    	if(authCheck())
    	{
    		$user = auth()->user();
    		if($user->email == $req->email)
    		{
    			$req->validate([
    				'email' => 'unique:users'
    			]);
    		}
    	}
    	else
    		$user = new User();

    	$user->name = $req->first_name. ' ' . $req->last_name;
    	$user->email = $req->email;
    	$user->password = bcrypt($req->password);
    	$user->role = 'garage';
    	$user->save();

    	$garage = $user->garage_profile ?: new GarageProfile();
    	$garage->user_id = $user->id;
    	$garage->name = $req->garage_name;
        $garage->slug = str_slug($req->garage_name);
    	$garage->save();

    	// Auth::login($user);
        Session::flash("success","Your account has been successfully registered");
        Mail::send('emails.garage.verification',['user' => $user, 'garage' => $garage], function ($send) use($user){
            $send->to($user['email'])->subject('Verify your email address');
            });
    	return redirect()->route('garage.send_verify_email',base64_encode($user->email));
    	return ['success', 'Personal information saved'];
    }

    public function profile()
    {
    	return view('garage.application.contact_information');
    }

    public function saveProfile(Request $req)
    {
        $messages = [
            'garage_name.required' => 'Enter the garage name',
            'garage_address.required' => 'Enter and select the garage address',
            'contact_1.required' => 'Enter the garage contact number',
            'garage_name.min' => 'Enter the valid garage name',
            'garage_name.max' => 'Enter the valid garage name',
            'website.url' => 'Enter the valid website address',
        ];
        $rules = [
            'garage_name' => 'required|min:2|max:50',
            'garage_address' => 'required',
            'contact_1' => ['required',new ContactNumberRule()],
            'contact_2' => [new ContactTwoRule()],
            'website' => ['max:191', new WebsiteUrlRule()],
            'registration_number' => [new CompanyRegNoRule()],
            'vat_registeration' => [new VatNoRule()],
        ];

         $this->validate($req,$rules,$messages);
        // dd($req);
        $garage = garage();
        $garage->name = $req->garage_name;
        $garage->address = $req->garage_address;
        $garage->address_lat = $req->address_lat;
        $garage->address_long = $req->address_long;
        $garage->pretty_address = $req->pretty_address;
    	$garage->contact_1 = $req->contact_1;
    	$garage->uk_postcode = $req->uk_postcode;
    	$garage->contact_2 = $req->contact_2 ?: null;
    	$garage->website = $req->website ?: null;
    	$garage->registration_number = $req->registration_number ?: null;
    	$garage->vat_no = $req->vat_registeration ?: null;
    	if ($garage->registration_step == 'garage_profile') {
            $garage->registration_step = 'services_and_facilities';
        }
    	$garage->save();

    	return redirect()->route('garage.application.redirection',['msg'=>'Your contact information has been saved']);
    	return ['success', 'Garage profile saved'];
    }

    public function facilities()
    {
        $selected_service = [];
        $selected_facilities = [];
        $selected_payment = [];
        $selected_keywords = [];

    	$services = Service::all();
		$payment_types = PaymentType::all();
        $customer_facilities = CustomerFacility::all();

        // This block of code is for that time when user came back to edit someting
        if (count(garage()->garage_services) > 0) {
            foreach (garage()->garage_services as $gs) {
                $selected_service[] = $gs->service_id;
            }
        }
        if (count(garage()->garage_customer_facilities) > 0) {
            foreach (garage()->garage_customer_facilities as $gcf) {
                $selected_facilities[] = $gcf->customer_facility_id;
            }
        }
        if (count(garage()->garage_payment_types) > 0) {
            foreach (garage()->garage_payment_types as $gpt) {
                $selected_payment[] = $gpt->payment_type_id;
            }
        }
        if (count(garage()->garage_keywords) > 0) {
            foreach (garage()->garage_keywords as $gk) {
                $selected_keywords[] = $gk->keyword;
            }
        }
		return view('garage.application.description', get_defined_vars());
    }

    public function saveFacilities(Request $req)
    {
        $messages = [
            'services.required' => 'Select the services the garage provides',
            'customer_facilities.required' => 'Select the customer facilities available at the garage',
            'payment_types.required' => 'Select the accepted payments',
            'keywords.required' => 'Enter searchable keywords that relate to your garage',
            'description.required' => 'Enter a description of the garage',
        ];
        $rules = [
            'services' => 'required|array|min:1',
    		'customer_facilities' => 'required|array|min:1',
    		'keywords' => 'required',
    		'payment_types' => 'required|array|min:1',
    		'description' => 'required|min:100'
        ];

        $this->validate($req,$rules,$messages);

    	$garage = garage();
    	if(count($garage->garage_services) > 0)
    		$garage->garage_services()->delete();
    	if(count($garage->garage_customer_facilities) > 0)
    		$garage->garage_customer_facilities()->delete();
    	if(count($garage->garage_payment_types) > 0)
    		$garage->garage_payment_types()->delete();
        if(count($garage->garage_keywords) > 0)
            $garage->garage_keywords()->delete();

    	foreach ($req->services as $item)
    	{
    		$gs = new GarageService();
    		$gs->garage_profile_id = $garage->id;
    		$gs->service_id = $item;
    		$gs->save();
    	}
    	foreach ($req->customer_facilities as $item)
    	{
    		$gs = new GarageCustomerFacility();
    		$gs->garage_profile_id = $garage->id;
    		$gs->customer_facility_id = $item;
    		$gs->save();
    	}
    	foreach ($req->payment_types as $item)
    	{
    		$gs = new GaragePaymentType();
    		$gs->garage_profile_id = $garage->id;
    		$gs->payment_type_id = $item;
    		$gs->save();
    	}
    	foreach (explode(',', $req->keywords) as $item)
    	{
    		$gs = new GarageKeyword();
    		$gs->garage_profile_id = $garage->id;
    		$gs->keyword = $item;
    		$gs->save();
    	}

        if ($garage->registration_step == 'services_and_facilities') {
            $garage->registration_step = 'working_hours';
        }
    	$garage->description = $req->description;
    	$garage->save();

    	return redirect()->route('garage.application.redirection',['msg'=>'Your description has been saved']);
    	return ['success', 'Services & facilities saved'];
    }

    public function workingHours()
    {
        // This block of code is for that time when user came back to edit someting
        $is_closed = [];
        $is_24h = [];
        $opening_time = [];
        $closing_time = [];

        if (count(garage()->working_hours) > 0) {
            foreach (garage()->working_hours as $wh) {
                $is_closed[] = $wh->is_closed;
                $is_24h[] = $wh->is_24;
                $opening_time[] = $wh->opening_time;
                $closing_time[] = $wh->closing_time;
            }
        }
    	return view('garage.application.working_hours', get_defined_vars());
    }

    public function saveWorkingHours(Request $req)
    {
    	$garage = garage();

        if(count($garage->working_hours) > 0)
            $garage->working_hours()->delete();

    	$days = [
    		'Monday', 'Tuesday', 'Wednesday',
    		'Thursday', 'Friday', 'Saturday', 'Sunday'
        ];

    	for($d=0;$d<7;$d++)
    	{
    		$wh = new WorkingHour();
            $wh->garage_profile_id = $garage->id;
    		$wh->day = $days[$d];
    		$wh->is_closed = $req->is_closed[$d] ?? 0;
    		$wh->is_24 = $req->is_24[$d] ?? 0;
    		$wh->opening_time = $req->opening_time[$d] ?: '00:00';
    		$wh->closing_time = $req->closing_time[$d] ?: '23:59';
    		$wh->save();
    	}

        if ($garage->registration_step == 'working_hours') {
            $garage->registration_step = 'gallery';
        }
    	$garage->save();

    	return redirect()->route('garage.application.redirection',['msg'=>'Your working hours have been saved']);
    	return ['success', 'Working hours saved'];
    }

    public function images()
    {
    	return view('garage.application.gallery');
    }

    public function saveImages(Request $req)
    {
    	$req->validate([
    		'images' => 'max:1000|array'
        ]);

        $garage = garage();

    	if ($req->has('images')) {
            foreach($req->images as $image)
            {
                $gi = new GarageImage();
                $gi->garage_profile_id = $garage->id;
                $gi->image = uploadFile($image, 'garage-galleries/'.str_slug($garage->name));
                $gi->save();
            }
        }

        if ($req->has('logo')) {
            if(!empty($garage->logo))
    		    deleteFile($garage->logo);
            $garage->logo = uploadFile($req->logo, 'garage-logos/'.str_slug($garage->name));
        }

        if ($garage->registration_step == 'gallery') {
            $garage->registration_step = 'done';
        }

    	$garage->save();

    	return redirect()->route('garage.application.redirection',['msg'=>'Your gallery images have been saved']);
    	return ['success', 'Garage gallery has been saved'];
    }

    public function deleteGalleryImage(Request $req)
    {
        $del_image = GarageImage::find($req->id)->delete();
        deleteFile($req->image);
        return response()->json([
            'success' => 'Image Deleted Successfully',
        ]);



    }

    public function overview()
	{
        $garage = garage();
		return view('garage.application.overview', get_defined_vars());
    }

    public function submit(Request $req)
    {
        $garage = garage();
        $garage->status = $req->status;
        $garage->save();
        $user=garage()->user;
        Mail::send('emails.garage.app_submitted',['user' => $user], function ($send) use($user){
            $send->to($user['email'])->subject('Your garage account application');
            });
        return redirect()->back()->with('success', 'Your application has been submitted');
    	return ['success', 'Your Application has successfully submitted'];
    }

    public function verifyEmail($email='')
    {
        $user=User::where('email',base64_decode($email))->first();
        $user->email_status="verified";
        $date=date("Y-m-d H:i:s");
        $user->email_verified_at=$date;
        $user->save();
        $details = [
            'msg' => 'You have been registered successfully',
        ];
        $user->notify(new RegisterUser($details));
        // Auth::login($user);
        return redirect()->route('garage.verified');

    }
    public function sentVerifyEmail(Request $request,$email)
    {
        return view('garage.garage_sent_verify_email',get_defined_vars());
    }
    public function resendVerifyEmail(Request $request,$email)
    {
        $email=base64_decode($email);
        $user=User::where("email",$email)->first();
        $garage=$user->garage_profile;
        // Session::flash("resend_success","We have sent a verification link to [EMAIL ADDRESS]. Please click on the link in your email to verify your account.")
        Mail::send('emails.garage.resend_verification',['user' => $user, 'garage' => $garage], function ($send) use($user){
            $send->to($user['email'])->subject('Verify your email address');
            });
            $msg="<p class='px-2'>We have resent a verification link to $email.</p> <p class='px-2'>Please click on the link in your email to verify your account.</p>";
        Session::flash("resend_success",$msg);
        return redirect()->back();
    }
    public function verified(Request $request)
    {
        return view('garage.garage_verified',get_defined_vars());
    }

    public function verifyCode(Request $request)
    {
        $code = implode($request->code);
        $garage = garage();
        $auth_code = $garage->verification_code;
        if ($auth_code == $code) {
            $garage->is_verified = 1;
            $garage->save();
        } else{
            return redirect()->back()->with('error', 'Please enter correct code');
        }
        return redirect()->route('garage.dashboard')->with('success', 'Your Verification code has been submitted');
    }
}
