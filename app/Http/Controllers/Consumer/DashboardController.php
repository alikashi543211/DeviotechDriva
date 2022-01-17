<?php

namespace App\Http\Controllers\Consumer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\VehicleRecordAPI;
use App\ConsumerVehicle;
use Auth;
use Mail;

class DashboardController extends Controller
{
    //
    use VehicleRecordAPI;


    public function dashboard(Request $request)
    {
        $notifications=auth()->user()->notifications()->orderBy('id','desc')->get();
        $notif_ids=[];
        foreach($notifications as $n)
        {
            if(!isset($n->data['booking_id']))
            {
            $notif_ids[]=$n->id;
            }
        }
        auth()->user()->unreadNotifications->whereIn('id',$notif_ids)->markAsRead();
        $unread_count=auth()->user()->unreadNotifications()->count();
        $read_count=auth()->user()->readNotifications()->count();
        $notifications=auth()->user()->notifications()->orderBy('id','desc')->get();
        if(count($notifications)>10)
        {
            $show_pagination=true;
        }else{
            $show_pagination=false;
        }
        return view('consumer.dashboard.dashboard',get_defined_vars());
    }
    public function notifications()
    {
        auth()->user()->unreadNotifications->markAsRead();
        $notifications=auth()->user()->notifications;
        return view('consumer.notifications.notifications',get_defined_vars());
    }
    public function loadPhoneForm()
    {
        $consumer = consumer();
        return view('consumer.ajax.load_phone_form', get_defined_vars());
    }

    public function savePhoneForm(Request $request)
    {
        if ($request->contact_number == "") {
            $message = array(
                'error' => 'Enter your contact number',
            );
            return response()->json($message);
        // } elseif ($request->address == "") {
        //     $message = array(
        //         'error' => 'Error! Please Write something',
        //     );
        //     return response()->json($message);
            }else {
            $consumer = consumer();
            $consumer->contact_number = $request->contact_number;
            // $consumer->address = $request->address;
            // $consumer->address_lat = $request->address_lat;
            // $consumer->address_long = $request->address_long;
            $consumer->save();

            $message = array(
                'success' => 'Your contact details has been updated',
            );
            return response()->json($message);
        }
    }

    public function loadSearchVehicleFrom()
    {
        return view('consumer.ajax.load_search_vehicle_form', get_defined_vars());
    }

    public function searchVehicles($vrm)
    {
        $data = [];
        $vehicle_detail = $this->searchVehicle($vrm);
        $vehicle_image = $this->searchVehicleImage($vrm);
        if ($vehicle_detail['StatusCode'] == "KeyInvalid" || $vehicle_detail['StatusCode'] == "ItemNotFound") {
            $data = array(
                // 'error' => $vehicle_detail['StatusMessage'],
                'error' => 'We could not find your vehicle. Please try again',
            );
        }
        elseif($vehicle_image['StatusCode'] == "KeyInvalid" || $vehicle_image['StatusCode'] == "ItemNotFound"){
            $data = array(
                // 'error' => $vehicle_image['StatusMessage'],
                'error' => 'We could not find your vehicle. Please try again',
            );
        }
        else{
            $data = array(
                'vrm' => $vehicle_detail['DataItems']['VehicleRegistration']['Vrm'],
                'make' => $vehicle_detail['DataItems']['VehicleRegistration']['Make'],
                'model' => $vehicle_detail['DataItems']['VehicleRegistration']['Model'],
                'engine_size' => $vehicle_detail['DataItems']['VehicleRegistration']['EngineCapacity'],
                'body_type' => $vehicle_detail['DataItems']['SmmtDetails']['BodyStyle'],
                'colour' => $vehicle_detail['DataItems']['VehicleRegistration']['Colour'],
                'image_url' => $vehicle_image['DataItems']['VehicleImages']['ImageDetailsList'][0]['ImageUrl'],
            );
        }
        if (array_key_exists('error', $data)) {
            return response()->json($data);
        } else {
            return view('consumer.ajax.show_vehicle', compact('data','vrm'));
        }
    }

    public function saveVehicle(Request $request)
    {
        if(auth()->user()->email_status=="not_verified")
        {
            $msg="Please verify your email to add vehicle";
            $message = array(
                'title' => 'Failed',
                'icon' => 'warning',
                'msg'=> $msg,
            );
            return response()->json($message);
        }
        if(preventDuplicateVehicle($request->vrm))
        {
            if(DuplicateVehicleMsg($request->vrm))
            {
                $msg='You already have added this vehicle';
            }else{
                $msg="This vehicle already has been been added";
            }
            $message = array(
                'title' => 'Failed',
                'icon' => 'warning',
                'msg'=> $msg,
            );
            return response()->json($message);
        }
        $consumer_veh = new ConsumerVehicle();
        $consumer_veh->consumer_profile_id = consumer()->id;
        $consumer_veh->vrm = $request->vrm;
        $consumer_veh->make = $request->make;
        $consumer_veh->model = $request->model;
        $consumer_veh->engine_size = $request->engine_size;
        $consumer_veh->body_type = $request->body_type;
        $consumer_veh->colour = $request->colour;
        $dir="consumer-vehicle-images/";
        $filename=str_slug(consumer()->user->name)."-".$request->vrm."-".$request->make;
        $extension=".jpg";
        $fetch_from=$request->image_url;
        $image_url=saveImgUrl($fetch_from,$dir,$filename,$extension);
        $consumer_veh->image_url = $image_url;
        $consumer_veh->save();
        $user=consumer()->user;

        $message = array(
            'title' => 'Success',
            'icon' => 'success',
            'msg' => 'Your vehicle details have been updated',
        );
        
        Mail::send('emails.consumer.update_vehicle',['user' => $user], function ($send) use($user){
            $send->to($user['email'])->subject('Vehicle records update');
        });
        return response()->json($message);

    }

    public function changeStatus(Request $req)
    {
        if($req->s=="away")
        {
            $status="available";
        }else{
            $status="away";
        }
        $consumer=consumer();
        $consumer->available_status=$status;
        $consumer->save();
        $message = array( 
            'msg' => 'Your status is set to '.$status,
            'status'=>$status,
        );
        return response()->json($message);
    }
}
