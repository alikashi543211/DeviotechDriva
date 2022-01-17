<?php

use Auth as Auth;
use Image as Image;
use DB as DB;
use Log as Log;
use File as File;
use App\User;
use App\Booking;
use App\Visitor;
use App\ConsumerVehicle;
use App\GarageProfile;
use Carbon\Carbon;
use App\GarageCustomerFacility;
use App\GaragePaymentType;
use App\GarageService;
use App\SavedGarage;
use App\Service;
use App\Setting;
use App\Review;
use App\GarageAdvertising;
use App\WorkingHour;

function authCheck()
{
    return Auth::check();
}

function garage()
{
    if(empty(auth()->user()))
        Auth::login(User::whereRole('garage')->first());
    if(auth()->user()->role=="sub_garage"){
        return GarageProfile::where("user_id",auth()->user()->parent_id)->first();
    }else{
        return auth()->user()->garage_profile;
    }
}

function consumer()
{
    if(empty(auth()->user()))
        Auth::login(User::whereRole('consumer')->first());

    return auth()->user()->consumer_profile;
}

function setting($name)
{
    $setting = Setting::pluck('value', 'name');
    return $setting[$name] ?? '';
}

function makeImage($file, $dir, $w=null, $h=null){
    $fullPath = $dir . time() . '-' . $file->getClientOriginalName();
    $image = Image::make($file);

    if($w && $h)
        $image = $image->resize($w , $h);

    $image = $image->encode($file->getClientOriginalExtension(),75);
    $image->save($fullPath);
    return $fullPath;
}

function uploadFile($file, $path){
    $name = time().'-'.str_replace(' ', '-', $file->getClientOriginalName());
    $file->move($path,$name);
    return $path.'/'.$name;
}

function get_client_ip(){
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    } else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    } else if (isset($_SERVER['REMOTE_ADDR'])) {
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    } else {
        $ipaddress = 'UNKNOWN';
    }

    return $ipaddress;
}

function getSettings($where){
    $toReturn = [];

    $settings = Setting::where('name', 'like', $where)->get();
    foreach($settings as $s)
        $toReturn[$s->name] = $s->value;

    return $toReturn;
}

function deleteFile($path)
{
    File::delete($path);
}

function getTimes(){
    $times = [
        "00:00", "01:00", "02:00", "03:00",
        "04:00", "05:00", "06:00", "07:00",
        "08:00", "09:00", "10:00", "11:00",
        "12:00", "13:00", "14:00", "15:00",
        "16:00", "17:00", "18:00", "19:00",
        "20:00", "21:00", "22:00", "23:00"
    ];
    return $times;
}

function getDays(){
    $days = [
        'Monday', 'Tuesday', 'Wednesday',
        'Thursday', 'Friday', 'Saturday',
        'Sunday'
    ];
    return $days;
}

// kashif functions
function dateFormat($created_at)
{
    $date=explode(" ",$created_at);
    $date=$date[0];
    return $date;
}

function getCreatedTime($created_at)
{
    $date=explode(" ",$created_at);
    $time=$date[1];
    return $time;
}

function getFirstName($name)
{
    $name=explode(" ",$name);
    $name=$name[0];
    return $name;
}

function websiteVisitor($request)
{
    $visitor = Visitor::where('ip', $request->ip())->whereDay('created_at', Carbon::today())->first();
        if ($visitor) {
            $visitor->no_of_visits++;
            $visitor->save();
        } else {
            $visitor = new Visitor();
            $visitor->ip = $request->ip();
            $visitor->agent = $request->header('User-Agent');
            $visitor->no_of_visits = 1;
            $visitor->save();
        }
        return true;
}

function getLastName($name)
{
    // $name=explode(" ",$name);
    // $name=$name[1];
    if(is_array($name))
    {
        return end($name);
    }else
    {
        return $name;
    }

}



function checkForPending($booking,$user="garage")
{
    if($booking->status=="pending"){
        return "";
    }else{
       if($booking->status=="inspection"){
        return [$user.".booking.inspection","Booking status is inspection"];
       }else if($booking->status=="in_progress"){
        return [$user.".booking.in_progress","Booking status is In Progress"];
       } else if($booking->status=="complete"){
        return [$user.".booking.complete","Booking status is completed"];
       } else if($booking->status=="cancel"){
        return [$user.".booking.cancel","Booking status is cancelled"];
       }
    }
}

function checkForInspection($booking,$user="garage")
{
    if($booking->status=="inspection"){
        return "";
    }else{
       if($booking->status=="pending"){
        return [$user.".booking.pending","Booking status is pending"];
       }else if($booking->status=="in_progress"){
        return [$user.".booking.in_progress","Booking status is In Progress"];
       } else if($booking->status=="complete"){
        return [$user.".booking.complete","Booking status is completed"];
       } else if($booking->status=="cancel"){
        return [$user.".booking.cancel","Booking status is cancelled"];
       }
    }
}

function checkForInProgress($booking,$user="garage")
{
    if($booking->status=="in_progress"){
        return "";
    }else{
       if($booking->status=="inspection"){
        return [$user.".booking.inspection","Booking status is inspection"];
       }else if($booking->status=="pending"){
        return [$user.".booking.pending","Booking status is In pending"];
       } else if($booking->status=="complete"){
        return [$user.".booking.complete","Booking status is completed"];
       } else if($booking->status=="cancel"){
        return [$user.".booking.cancel","Booking status is cancelled"];
       }
    }
}

function checkForComplete($booking,$user="garage")
{
    if($booking->status=="complete"){
        return "";
    }else{
       if($booking->status=="inspection"){
        return [$user.".booking.inspection","Booking status is inspection"];
       }else if($booking->status=="in_progress"){
        return [$user.".booking.in_progress","Booking status is In Progress"];
       } else if($booking->status=="pending"){
        return [$user.".booking.pending","Booking status is pending"];
       } else if($booking->status=="cancel"){
        return [$user.".booking.cancel","Booking status is cancelled"];
       }
    }
}

function checkForCancel($booking,$user="garage")
{
    if($booking->status=="cancel"){
        return "";
    }else{
       if($booking->status=="inspection"){
        return [$user.".booking.inspection","Booking status is inspection"];
       }else if($booking->status=="in_progress"){
        return [$user.".booking.in_progress","Booking status is In Progress"];
       } else if($booking->status=="complete"){
        return [$user.".booking.complete","Booking status is completed"];
       } else if($booking->status=="pending"){
        return [$user.".booking.pending","Booking status is pending"];
       }
    }
}

function saveImgUrl($fetch_from,$dir,$filename,$extension)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_POST, 0);
    curl_setopt($ch,CURLOPT_URL,$fetch_from);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result=curl_exec($ch);
    curl_close($ch);
    $savefile = fopen($dir . $filename.$extension, 'w');
    fwrite($savefile, $result);
    fclose($savefile);
    return $dir.$filename.$extension;
}

function preventDuplicateVehicle($vrm)
{
    $count=ConsumerVehicle::where("vrm",$vrm)->count();
    if($count>0){
        return true;
    }else{
        return false;
    }
}


function DuplicateVehicleMsg($vrm)
{
    $count=ConsumerVehicle::where("vrm",$vrm)->where('consumer_profile_id',consumer()->id)->count();
    if($count>0){
        return true;
    }else{
        return false;
    }
}

function count_digits( $str )
{
    return preg_match_all( "/[0-9]/", $str );
}

function count_capital_letters($string_letter)
{
    return strlen(preg_replace('/[^A-Z]+/', '', $string_letter));
}

function count_small_letters($string_letter)
{
    return strlen(preg_replace('/[^a-z]+/', '', $string_letter));
}

function genVerifCode() {
    $number = mt_rand(10000000, 99999999);

    if (verifCodeExists($number)) {
        return genVerifCode();
    }
    return $number;
}

function verifCodeExists($number) {
    return GarageProfile::whereVerificationCode($number)->exists();
}
function count_spaces($string)
{
    return substr_count($string, ' ');
}


function getNDaysDates($days, $format = 'd/m')
{
    $m = date("m"); $de= date("d"); $y= date("Y");
    $dateArray = array();
    for($i=0; $i<=$days-1; $i++){
        $dateArray[] = '"' . date($format, mktime(0,0,0,$m,($de-$i),$y)) . '"';
    }
    $res=array_reverse($dateArray);
    $first=$res[0];
    $last=$res[sizeof($res)-1];
    $first=trim($first,'"');
    $last=trim($last,'"');
    return [$first,$last];
}

function sendOtp()
{
    if(auth()->user()->two_factor_login==1){
        $otp=str_shuffle("123456");
        $user=auth()->user();
        Session::put("otp",$otp);
        Session::put("two_factor_auth",false);
        $user->save();
        Mail::send('emails.admin.login_otp',['user' => $user,'otp'=>$otp], function ($send) use($user){
        $send->to($user['email'])->subject('Verify Login');
        });
    }else{
        Session::put("two_factor_auth",true);
    }
}

function approved_garages()
{
    $query=GarageProfile::where("status","approved");
    return $query;
}

function get_nth_element($variable,$seperator,$index)
{
    $name=explode($seperator,$variable);
    $name=$name[$index];
    return $name;
}

function saved_garage($garage_id)
{
    if(consumer_role())
    {
        $count=consumer()->saved_garages->where('garage_profile_id',$garage_id)->count();
        if($count>0)
        {
            return true;
        }else
        {
            return false;
        }
    }else
    {
        return false;
    }
}

function search_by_location($req)
{
    $long_lat_ids=array();
    $radius_location_ids=[];
    $address_first=explode(', UK',$req->location)[0];
    $max_distance = 2;
    $address_ids=approved_garages()
            ->where('address','LIKE','%'.$address_first.'%')
            ->pluck('id')
            ->toArray();
    if(!empty($req->address_lat) && !empty($req->address_long))
    {
        $gr_circle_radius = 6371;
        if(isset($req->min_radius) && isset($req->max_radius))
        {

            $radius_locations = DB::select("select * from(select *,( 6371 * acos( cos( radians(".$req->address_lat.") ) * cos( radians(garage_profiles.address_lat ) ) * cos( radians( garage_profiles.address_long ) - radians(".$req->address_long.")) + sin( radians(".$req->address_lat.") ) * sin( radians( garage_profiles.address_lat ) ) ) ) AS distance from garage_profiles) as innertable where distance < ".$max_distance);
        }else
        {
            $radius_locations = DB::select("select * from(select *,( 6371 * acos( cos( radians(".$req->address_lat.") ) * cos( radians(garage_profiles.address_lat ) ) * cos( radians( garage_profiles.address_long ) - radians(".$req->address_long.")) + sin( radians(".$req->address_lat.") ) * sin( radians( garage_profiles.address_lat ) ) ) ) AS distance from garage_profiles) as innertable where distance < ".$max_distance);
            
        }

        
        foreach($radius_locations as $loc)
        {
            $radius_location_ids[]=$loc->id;
        }

        $featured_locations = DB::select("select * from(select *,( 6371 * acos( cos( radians(".$req->address_lat.") ) * cos( radians(garage_profiles.address_lat ) ) * cos( radians( garage_profiles.address_long ) - radians(".$req->address_long.")) + sin( radians(".$req->address_lat.") ) * sin( radians( garage_profiles.address_lat ) ) ) ) AS distance, garage_profiles.search_radius as radius from garage_profiles) as innertable where distance < radius");
        $featured_location_ids=[];
        foreach($featured_locations as $loc)
        {
            $featured_location_ids[]=$loc->id;
        }
        $long_lat_ids=array_unique(array_merge($radius_location_ids,$featured_location_ids));
    }else
    {
        $long_lat_ids = [];
    }
    $location_ids=array_unique(array_merge($long_lat_ids,$address_ids));

    $garages_list=$location_ids;
    return $garages_list;

}

function search_by_keywords($garages_list,$req)
{
    $by_location_ids=$garages_list;
    $by_name_ids=approved_garages()
        ->where('name', 'LIKE', '%'.$req->keyword.'%')
        ->pluck('id')
        ->toArray();


    $by_keyword_ids = approved_garages()->whereHas('garage_keywords', function($q) use($req){
            $q->where('keyword', 'like', '%'.$req->keyword.'%');
        })->pluck('id')
            ->toArray();

    // Or Operator
    // $unique_ids=array_unique(array_merge($by_name_ids,$by_keyword_ids,$by_location_ids));
    // $garages_list=approved_garages()
    //     ->whereIn('id',$unique_ids);

    // And Operator
    $unique_ids = array_unique(array_merge($by_name_ids, $by_keyword_ids)); 
    $intersect_ids = array_intersect($unique_ids, $by_location_ids);
    $garages_list = approved_garages()
        ->whereIn('id', $intersect_ids);
    

    // And Operator
    // $name_keyword_ids=array_unique(array_merge($by_name_ids,$by_keyword_ids));
    // $common_ids=array_intersect($name_keyword_ids, $by_location_ids);
    // // dd($common_ids);
    // $garages_list=approved_garages()
    //     ->whereIn('id',$common_ids);

    // dd(get_defined_vars());
    return $garages_list;
}

function search_by_filter($garages_list,$req)
{
    $by_service_filter=[];
    $by_facility_filter=[];
    $by_payment_filter=[];
    $by_status_filter=[];
    if(isset($req->services))
    {
      $garages_list=$garages_list->whereHas('garage_services', function($q) use($req){
        $q->whereHas('service', function($q) use($req){
            $q->whereIn('name', $req->services);
        });
      });
    }
    if(isset($req->facilities))
    {
      $garages_list=$garages_list->whereHas('garage_customer_facilities', function($q) use($req){
        $q->whereHas('customer_facility', function($q) use($req){
            $q->whereIn('name', $req->facilities);
        });
      });
    }
    if(isset($req->payments))
    {
      $garages_list=$garages_list->whereHas('garage_payment_types', function($q) use($req){
        $q->whereHas('payment_type', function($q) use($req){
            $q->whereIn('name', $req->payments);
        });
      });
    }
    if(isset($req->availabilities))
    {
      $garages_list=$garages_list->whereIn('available_status',$req->availabilities);
    }
    return $garages_list;
}

function radians($degrees)
{
     return 0.0174532925 * $degrees;
}

function garage_is_approved($garage)
{
    if($garage->status=='approved')
    {
        return true;
    }else
    {
        return false;
    }
}

function garage_is_submitted($garage)
{
    if($garage->status=='submitted')
    {
        return true;
    }else
    {
        return false;
    }
}

function consumer_role()
{
    if(Auth::check() && auth()->user()->role=='consumer')
    {
        return true;
    }else
    {
        return false;
    }
}

function get_first_garage_image($garage)
{
    $img=$garage->garage_images;
    foreach($img as $item)
    {
        return $item->image;
    }
}

function save_search()
{
    $search=request()->fullUrl();
    $search=explode('?',$search);
    $search =end($search);
    Session::put("search_keywords",$search);
    return $search;
}

function save_garage($id)
{
    DB::statement("SET foreign_key_checks = 0");
    if(!saved_garage($id))
    {
        SavedGarage::create(['garage_profile_id'=>$id,
                        'consumer_profile_id'=>consumer()->id]);
        return true;
    }else
    {
        return false;
    }
}


function getService($id)
{
    $service = Service::find($id);
    if (is_null($service)) {
        return null;
    } else {
        return $service;
    }

}

function is_review_submit($id)
{
    $r=Review::where('booking_id',$id)
        ->where('user_id',auth()->user()->id)
        ->first();
    if(!is_null($r))
    {
        return true;
    }else
    {
        return false;
    }

}

function graphConsumerBooking($req)
{
    // dd(consumer()->id);
    $data_array=array();
    $booking_sum=0;
    $avg_booking=0;

    if(isset($req->graph_duration))
    {
        if($req->graph_duration=='1')
        {
            $days_result=last_seven_days($req);
        }
        if($req->graph_duration=='2')
        {
            $days_result=last_seven_days($req,28);
        }
        if($req->graph_duration=='3')
        {
            $days_result=(object)['limit'=>'4','report'=>'last_month'];
        }
        if($req->graph_duration=='4')
        {
            $days_result=(object)['limit'=>'12','report'=>'last_year'];
        }
        $chart_duration=$req->graph_duration;
    }else
    {
        $days_result=last_seven_days($req);
        $chart_duration='1';
    }

    // Last Seven or 28 Days...
    if($chart_duration=='1' || $chart_duration=='2')
    {
        $data = Booking::selectRaw("*,WEEKDAY(created_at) as day")
            ->where('consumer_profile_id',consumer()->id)
            ->whereBetween('created_at', [$days_result->start_day,$days_result->end_day])
            ->get();
        $not_get_data=Booking::selectRaw("*,WEEKDAY(created_at) as day")
            ->where('consumer_profile_id',consumer()->id)
            ->whereBetween('created_at', [$days_result->start_day,$days_result->end_day]);

        for($i = 0;$i < $days_result->limit;$i++)
        {
            $booking_count=$data->where('day' , $i)->count() ?? 0;
            $data_array[]=$booking_count;
            $booking_sum=$booking_sum+$booking_count;
        }
    }

    // Last Month
    if($chart_duration=='3')
    {
        $data = Booking::selectRaw("*,MONTH(created_at) as month , CEILING(DAY(created_at)/7) as week")->whereMonth('created_at', Carbon::now()->subMonth()->month)
            ->where('consumer_profile_id',consumer()->id)
            ->get();

        $not_get_data = Booking::selectRaw("*,MONTH(created_at) as month , CEILING(DAY(created_at)/7) as week")->whereMonth('created_at', Carbon::now()->subMonth()->month)
            ->where('consumer_profile_id',consumer()->id);

        for($i = 0;$i < $days_result->limit;$i++)
        {
            $booking_count=$data->where('week' , $i)->count() ?? 0;
            $data_array[]=$booking_count;
            $booking_sum=$booking_sum+$booking_count;
        }
        // dd($data_array);
    }

    // Last Year
    if($chart_duration=='4')
    {
        $data = Booking::selectRaw("*,YEAR(created_at) as year , MONTH(created_at) as month")
            ->whereYear('created_at', Carbon::now()->year-1)
            ->where('consumer_profile_id',consumer()->id)
            ->get();

        $not_get_data = Booking::selectRaw("*,YEAR(created_at) as year , MONTH(created_at) as month")
            ->whereYear('created_at', Carbon::now()->year-1)
            ->where('consumer_profile_id',consumer()->id);

        for($i = 0;$i < $days_result->limit;$i++)
        {
            $booking_count=$data->where('month' , $i)->count() ?? 0;
            $data_array[]=$booking_count;
            $booking_sum=$booking_sum+$booking_count;
        }
        // dd($data_array);
    }



    $delayed_count = $data->where('extension_status','accepted')->count() ?? 0;

    $reported_count = $not_get_data->has('reports')->count() ?? 0;

    $completed_count=$data->where('status','complete')->count() ?? 0;

    $cancelled_count=$data->where('status','cancel')->count() ?? 0;

    if(count($data_array)>0)
    {
        $avg_booking=$booking_sum/count($data_array);
        $min =min($data_array);
        $max=max($data_array);
    }else
    {
        $min=0;
        $max=10;
    }

    $limit=$days_result->limit ?? 0;

    // dd(get_defined_vars());
    return (object)get_defined_vars();
}

function circleConsumerBooking($req,$duration=1)
{
    $data_array=array();

    if(isset($req->circle_duration))
    {
        if($req->circle_duration=='1')
        {
            $days_result=last_seven_days($req);
        }
        if($req->circle_duration=='2')
        {
            $days_result=last_seven_days($req,28);
        }
        if($req->circle_duration=='3')
        {
            $days_result=(object)['limit'=>'4','report'=>'last_month'];
        }
        if($req->circle_duration=='4')
        {
            $days_result=(object)['limit'=>'12','report'=>'last_year'];
        }
        $chart_duration=$req->circle_duration;
    }else
    {
        $days_result=last_seven_days($req);
        $chart_duration='1';
    }

    // Last Seven or 28 Days..
    if($chart_duration=='1' || $chart_duration=='2')
    {
        $data = Booking::selectRaw("*,WEEKDAY(created_at) as day")
            ->where('consumer_profile_id',consumer()->id)
            ->whereBetween('created_at', [$days_result->start_day,$days_result->end_day])
            ->get();

        for($i = 0;$i < $days_result->limit;$i++)
        {
            $data_array[]=$data->where('day' , $i)->count() ?? 0;
        }
    }

    // Last Month
    if($chart_duration=='3')
    {
        $data = Booking::selectRaw("*,MONTH(created_at) as month , CEILING(DAY(created_at)/7) as week")
            ->whereMonth('created_at', Carbon::now()->subMonth()->month)
            ->where('consumer_profile_id',consumer()->id)
            ->get();

        for($i = 0;$i < $days_result->limit;$i++)
        {
            $data_array[]=$data->where('week' , $i)->count() ?? 0;
        }
    }

    // Last Year.
    if($chart_duration=='4')
    {
        $data = Booking::selectRaw("*,YEAR(created_at) as year , MONTH(created_at) as month")
            ->whereYear('created_at', Carbon::now()->year-1)
            ->where('consumer_profile_id',consumer()->id)
            ->get();

        for($i = 0;$i < $days_result->limit;$i++)
        {
            $data_array[]=$data->where('month' , $i)->count() ?? 0;
        }
    }



    $total_bookings_count=$data->count() ?? 0;

    $active_bookings_count = $data->whereIn('status',['inspection','in_progress'])
        ->count() ?? 0;

    $completed_bookings_count = $data->where('status','complete')
        ->count() ?? 0;
    if($total_bookings_count>0)
    {
        $percent_complete=ceil(($completed_bookings_count/$total_bookings_count)*100) ?? 0;
    }else
    {
        $percent_complete=0;
    }




    if(count($data_array)>0)
    {
        $min =min($data_array);
        $max=max($data_array);
    }else
    {
        $min=0;
        $max=10;
    }
    $limit=$days_result->limit ?? 0;
    // dd(get_defined_vars());
    return (object)get_defined_vars();
}

function last_seven_days($req,$limit = 7)
{
    $report = 'day';
    $days=getNDaysDates($limit, 'Y-m-d');
    $start_day=$days[0];
    $end_day=$days[1];

    return (object)get_defined_vars();
}

function updateGarageProfilesRadius()
{
    $list=GarageProfile::has("garage_advertisings")->get();
    foreach($list as $item)
    {
        $garage=GarageProfile::find($item->id);
        $garage_ad=$garage->garage_advertisings
            ->where('status','active')
            ->first();
        if($garage_ad->plan=='city')
        {
            $search_radius=setting("city_radius");
        }else
        {
           $search_radius=setting("district_radius");
        }
        $garage->search_radius=$search_radius;
        $garage->save();
    }
    return true;
}

function advertisingCroneJob()
{
    $list=GarageAdvertising::where('end_date', '=' , date('d-m-Y'))
        ->where('status','active')->get();
    foreach($list as $item)
    {
        $item->status='ended';
        $item->save();
        $garage=GarageProfile::find($item->garage_profile_id);
        $garage->search_radius=0;
        $garage->is_featured=0;
        $garage->save();
    }
    return "Testing";

}

function advertisementsGraph($req)
{
    $data_array=array();
    $booking_sum=0;
    $avg_booking=0;

    if(isset($req->set_date))
    {
        if($req->graph_duration=='1')
        {
            $days_result=last_seven_days($req);
        }
        if($req->graph_duration=='2')
        {
            $days_result=last_seven_days($req,28);
        }
        if($req->graph_duration=='3')
        {
            $days_result=(object)['limit'=>'4','report'=>'last_month'];
        }
        if($req->graph_duration=='4')
        {
            $days_result=(object)['limit'=>'12','report'=>'last_year'];
        }
        $chart_duration=$req->graph_duration;
    }else
    {
        $days_result=last_seven_days($req);
        $chart_duration='1';
    }

    // Last Seven or 28 Days...
    if($chart_duration=='1' || $chart_duration=='2')
    {
        $data = Booking::selectRaw("*,WEEKDAY(created_at) as day")
            ->where('consumer_profile_id',consumer()->id)
            ->whereBetween('created_at', [$days_result->start_day,$days_result->end_day])
            ->get();
        $not_get_data=Booking::selectRaw("*,WEEKDAY(created_at) as day")
            ->where('consumer_profile_id',consumer()->id)
            ->whereBetween('created_at', [$days_result->start_day,$days_result->end_day]);

        for($i = 0;$i < $days_result->limit;$i++)
        {
            $booking_count=$data->where('day' , $i)->count() ?? 0;
            $data_array[]=$booking_count;
            $booking_sum=$booking_sum+$booking_count;
        }
    }

    // Last Month
    if($chart_duration=='3')
    {
        $data = Booking::selectRaw("*,MONTH(created_at) as month , CEILING(DAY(created_at)/7) as week")->whereMonth('created_at', Carbon::now()->subMonth()->month)
            ->where('consumer_profile_id',consumer()->id)
            ->get();

        $not_get_data = Booking::selectRaw("*,MONTH(created_at) as month , CEILING(DAY(created_at)/7) as week")->whereMonth('created_at', Carbon::now()->subMonth()->month)
            ->where('consumer_profile_id',consumer()->id);

        for($i = 0;$i < $days_result->limit;$i++)
        {
            $booking_count=$data->where('week' , $i)->count() ?? 0;
            $data_array[]=$booking_count;
            $booking_sum=$booking_sum+$booking_count;
        }
        // dd($data_array);
    }

    // Last Year
    if($chart_duration=='4')
    {
        $data = Booking::selectRaw("*,YEAR(created_at) as year , MONTH(created_at) as month")
            ->whereYear('created_at', Carbon::now()->year-1)
            ->where('consumer_profile_id',consumer()->id)
            ->get();

        $not_get_data = Booking::selectRaw("*,YEAR(created_at) as year , MONTH(created_at) as month")
            ->whereYear('created_at', Carbon::now()->year-1)
            ->where('consumer_profile_id',consumer()->id);

        for($i = 0;$i < $days_result->limit;$i++)
        {
            $booking_count=$data->where('month' , $i)->count() ?? 0;
            $data_array[]=$booking_count;
            $booking_sum=$booking_sum+$booking_count;
        }
        // dd($data_array);
    }



    $delayed_count = $data->where('extension_status','accepted')->count() ?? 0;

    $reported_count = $not_get_data->has('reports')->count() ?? 0;

    $completed_count=$data->where('status','complete')->count() ?? 0;

    $cancelled_count=$data->where('status','cancel')->count() ?? 0;

    if(count($data_array)>0)
    {
        $avg_booking=$booking_sum/count($data_array);
        $min =min($data_array);
        $max=max($data_array);
    }else
    {
        $min=0;
        $max=10;
    }

    $limit=$days_result->limit ?? 0;

    // dd(get_defined_vars());
    return (object)get_defined_vars();
}


function garageFollowers($id) {
    $count = 0;
    $saved_count = SavedGarage::where('garage_profile_id', $id)->count();
    $booking_count = Booking::where('garage_profile_id', $id)->distinct('consumer_profile_id')->count();

    return $count + $saved_count + $booking_count;
}

function getAdsOrderNo() {
    $number = mt_rand(10000000, 99999999);

    if (verifAdsOrderNo($number)) {
        return getAdsOrderNo();
    }
    return $number;
}

function verifAdsOrderNo($number) {
    return GarageAdvertising::whereOrderNo($number)->exists();
}

function garage_reviews($garage)
{
    $count = Review::where('garage_profile_id',$garage->id)
        ->where('user_id','!=',$garage->user->id)
        ->count();
    return $count;
}

function garage_stars($garage)
{
    $avg = Review::where('garage_profile_id',$garage->id)
        ->where('user_id','!=',$garage->user->id)
        ->avg('rating');
    return $avg;
}

function isOpen($garage_id)
{
    $day = Carbon::now()->format('l');
    $record = WorkingHour::where('garage_profile_id', $garage_id)
        ->where('day', $day)
        ->first();
    if($record->is_closed == 0){
        return true;
    }else{
        return false;
    }
}

function getOpeningTime($garage_id)
{
    $day = Carbon::now()->format('l');
    $record = WorkingHour::where('garage_profile_id', $garage_id)
        ->where('day', $day)
        ->first();
    return $record->opening_time." - ".$record->closing_time;
}

function is_24Hours($garage_id)
{
    $day = Carbon::now()->format('l');
    $record = WorkingHour::where('garage_profile_id', $garage_id)
        ->where('day', $day)
        ->first();
    if($record->is_24 == 1 && $record->is_closed != 1){
        return true;
    }else{
        return false;
    }
}

?>
