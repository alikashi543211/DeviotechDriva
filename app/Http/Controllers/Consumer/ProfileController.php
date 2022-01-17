<?php

namespace App\Http\Controllers\Consumer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\ConsumerProfile;
use App\GarageProfile;
use Hash;
use Session;
use App\Rules\PasswordRule;
use App\Rules\PasswordExistRule;
use App\Notifications\AccountUpdate;
use App\Rules\ContactNumberRule;
use App\Rules\FirstNameRule;
use App\Rules\LastNameRule;
use App\Booking;
use Carbon\Carbon;
use App\Review;

class ProfileController extends Controller
{
    public function profile(Request $req)
    {
        $graphConsumerBooking=graphConsumerBooking($req);
        $circleConsumerBooking=circleConsumerBooking($req);
        $consumer_info=Auth::user();
        // $feedback_comments=Review::where('rec_id',auth()->user()->id)->orWhere('send_id',auth()->user()->id)->get();
        $booking_ids=consumer()->garage_bookings
            ->pluck('id')
            ->toArray();
        $reviews_list=Review::whereIn('booking_id',$booking_ids)
            ->get();
        $total_count=consumer()->garage_bookings->where("status","complete")->count();
        
        $garage_ids=consumer()->saved_garages->pluck('garage_profile_id')->toArray();
        $garages=GarageProfile::whereIn('id',$garage_ids)->paginate(5);
        return view("consumer.profile.profile",get_defined_vars());
    }
    public function index()
    {
    	$consumer=Auth::user();
    	$consumer_name=explode(" ",$consumer->name);
    	$first_name=$consumer_name[0];
    	$last_name=$consumer_name[1];
        return view("consumer.settings.account_profile",get_defined_vars());
    }

    public function updateProfile(Request $req)
    {
        $messages = [
            'first_name.required' => 'Enter your first name',
            'last_name.required' => 'Enter your last name',
            'picture.image' => 'Upload a valid profile image',
            'email.required' => 'Enter your email address',
            'contact_number.required' => 'Enter your contact number',
            'email.email' => 'Enter a valid email address',
        ];
        $rules = [
            'first_name' => ['required','string','max:95',new FirstNameRule()],
            'last_name' => ['required','string','max:95',new LastNameRule()],
            'picture' => 'image|mimes:jpeg,png,jpg|max:1000',
            'email'=>'required|email'.(!authCheck() ? '|unique:users' : ''),
            'contact_number' => ['required','max:191',new ContactNumberRule()],
        ];

         $this->validate($req,$rules,$messages);
    	$user = auth()->user();
    	$user->name = $req->first_name. ' ' . $req->last_name;
    	$user->email = $req->email;
    	$user->save();
    	$profile=$user->consumer_profile;
    	$profile->contact_number=$req->contact_number;
        // $profile->display_name=$req->first_name. ' ' . $req->last_name;
        if(isset($req->available_status)){
            $profile->available_status = "available";
        }else{
            $profile->available_status = "away";
        }
    	if($req->has('picture')) {
            $profile->picture = uploadFile($req->picture, 'consumer_profile-pictures/'.str_slug($user->name));
        }
        $profile->save();
        $consumer=Auth::user();
        $details = [
            'msg' => 'Your account details have been updated'
        ];
        $consumer->notify(new AccountUpdate($details));
        return redirect()->route('consumer.settings.account')->with('success', 'Your profile details have been updated');
    	return ['success', 'General information saved'];
    }

    public function authentication()
    {
        return view('consumer.settings.authentication');
    }

    public function updatePassword(Request $req)
    {
        $messages = [
            'old_password.required' => 'Enter your old password',
            'password.required' => 'Enter your password',
            'password.confirmed' => 'Confirm your password',
            'password.min' => 'Enter a stronger password',


        ];
        $rules = [
            'old_password' => ['required',new PasswordExistRule()],
            'password' => ['required','min:6','confirmed',new PasswordRule()],
        ];
        $this->validate($req,$rules,$messages);
        $user=Auth::user();
        $user->password=Hash::make($req->password);
        $user->save();
        $consumer=Auth::user();
        $details = [
            'msg' => 'Your account details have been updated'
        ];
        $consumer->notify(new AccountUpdate($details));
        return redirect()->route('consumer.settings.authentication')->with('success', 'Your login details have been updated');
    }

    public function twoFactorLogin(Request $req)
    {
        if($req->status==1)
        {
            $user=auth()->user();
            $user->two_factor_login=1;
            $user->save();
            $msg="Two factor login authentication has been On successfully";
        }else if($req->status==0)
        {
            $user=auth()->user();
            $user->two_factor_login=0;
            $user->save();
            $msg="Two factor login authentication has been Off successfully";
        }
        return response()->json(["msg"=>$msg]);
    }

    
        
    public function bookingStat(Request $req)
    {
        // if(isset($req->chart) && $req->chart=="last_twenty_eight")
        // {
        //     $target_id=$req->id;
        //     $report = 'day';
        //     $report_of = 'Last 28 Days';
        //     $limit = 28;
        //     $days=getNDaysDates(28, 'Y-m-d');
        //     $start_day=$days[0];
        //     $end_day=$days[1];
        //     $total_bookings = Booking::selectRaw("*,WEEKDAY(created_at) as day")->whereBetween('created_at', [$start_day,$end_day]);

        // }elseif(isset($req->chart) && $req->chart=="last_month")
        // {
        //     $report = 'week';
        //     $report_of = 'Last Month';
        //     $limit = 4;

        //     $total_bookings = Booking::selectRaw("*,MONTH(created_at) as month , CEILING(DAY(created_at)/7) as week")->whereMonth('created_at', Carbon::now()->subMonth()->month);
        // }
        // elseif(isset($req->chart) && $req->chart=="last_year")
        // {
        //     // return "Last Year";
        //     $report = 'month';
        //     $report_of = 'Last Year';
        //     $limit = 12;

        //     $total_bookings = Booking::selectRaw("*,YEAR(created_at) as year , MONTH(created_at) as month")->whereYear('created_at', Carbon::now()->year-1);
        // }
        // else{
        //     $target_id=$req->id;
        //     $report = 'day';
        //     $report_of = 'Last 7 days';
        //     $limit = 7;
        //     $days=getNDaysDates(7, 'Y-m-d');
        //     $start_day=$days[0];
        //     $end_day=$days[1];
        //     $total_bookings = Booking::selectRaw("*,WEEKDAY(created_at) as day")->whereBetween('created_at', [$start_day,$end_day]);
        // }

        // $total_bookings=$total_bookings->where('consumer_profile_id',consumer()->id);
        // $total_bookings_new=$total_bookings;
        // $total_bookings_count=$total_bookings->count();
        // $total_bookings=$total_bookings->get();
        // $completed_bookings_count=count($total_bookings->where('status','complete'));
        // $cancelled_bookings_count=count($total_bookings->where('status','cancel'));
        // $delayed_bookings_count=count($total_bookings->where('extend_date','!=',NULL)->whereNotIn('status',['complete','cancel']));
        // $reported_bookings_count=$total_bookings_new->whereHas('reports', function($q){
        // })->count();
        // return view("consumer.ajax.profile_views_chart",get_defined_vars());
        return response()->json('true');
    }

    public function completedStat(Request $req)
    {
        if(isset($req->chart) && $req->chart=="last_twenty_eight")
        {
            // return "All right";
            $report = 'day';
            $report_of = 'Last 28 days';
            $limit = 28;
            $days=getNDaysDates(28, 'Y-m-d');
            $start_day=$days[0];
            $end_day=$days[1];

            $total_bookings = Booking::selectRaw("*,WEEKDAY(created_at) as day")->whereBetween('created_at', [$start_day,$end_day]);
        }elseif(isset($req->chart) && $req->chart=="last_month")
        {
            $report = 'week';
            $report_of = 'Last Month';
            $limit = 4;

            $total_bookings = Booking::selectRaw("*,MONTH(created_at) as month , CEILING(DAY(created_at)/7) as week")->whereMonth('created_at', Carbon::now()->subMonth()->month);
        }elseif(isset($req->chart) && $req->chart=="last_year")
        {
            $report = 'month';
            $report_of = 'Last Year';
            $limit = 12;

            $total_bookings = Booking::selectRaw("*,YEAR(created_at) as year , MONTH(created_at) as month")->whereYear('created_at', Carbon::now()->year-1);
        }else{
            $target_id=$req->id;
            $report = 'day';
            $report_of = 'Last 7 days';
            $limit = 7;
            $days=getNDaysDates(7, 'Y-m-d');
            $start_day=$days[0];
            $end_day=$days[1];

            $total_bookings = Booking::selectRaw("*,WEEKDAY(created_at) as day")->whereBetween('created_at', [$start_day,$end_day]);
        }
        $total_bookings=$total_bookings->where('consumer_profile_id',consumer()->id);
        $total_bookings=$total_bookings->get();
        $total_bookings_count=count($total_bookings);
        $active_bookings_count=count($total_bookings->whereIn('status',['inspection','in_progress']));
        $complete_bookings=$total_bookings->where("status","complete");
        $complete_bookings_count=count($total_bookings->where('status','complete'));
        $bookings_count=$complete_bookings_count;
        if($total_bookings_count>=$complete_bookings_count && $total_bookings_count!=0){
        $complete_percent=ceil(($complete_bookings_count/$total_bookings_count)*100);
        }else{
            $complete_percent=0;
        }
        $circle_percent=ceil((210*$complete_percent)/100);
        return view("consumer.ajax.booking_statistics_chart",get_defined_vars());
    }

    public function updateStatus(Request $req)
    {
        if($req->status=="available")
        {
            $consumer=consumer();
            $consumer->available_status=$req->status;
            $consumer->save();
            $msg="Your status is set to ".$req->status;
        }else if($req->status=="away")
        {
            $consumer=consumer();
            $consumer->available_status=$req->status;
            $consumer->save();
            $msg="Your status is set to ".$req->status;
        }
        return response()->json(["msg"=>$msg]);
    }
    public function remove_garage(Request $req)
    {
        $sg=consumer()->saved_garages->where('garage_profile_id',$req->garage_id)->first();
        $sg->delete();
        return response()->json("Removed successfully");
    }

}
