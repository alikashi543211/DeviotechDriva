<?php
namespace App\Http\Controllers\Consumer;

use App\Booking;
use App\ConsumerVehicle;
use App\ConsumerProfile;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Report;
use Auth;
use Session;
use App\Notifications\UpdateBooking;
use App\Notifications\DeclineBookingRequest;
use Mail;
use App\Rules\RatingRule;
use App\Review;

class BookingController extends Controller
{
    public function index()
    {
      $bookings=consumer()->garage_bookings;
      return view('consumer.booking.booking_list', get_defined_vars());
    }
    public function pendingStatus(Request $request)
    {
        if(isset($request->notify_id))
        {
            auth()->user()->unreadNotifications->where("id",$request->notify_id)->markAsRead();
        }
        $booking=Booking::find($request->booking);
        $result=checkForPending($booking,"consumer");
        if(!empty($result)){
            $route=$result[0];
            // $msg=$result[1];
            $msg="There has been an update to your booking";

            return redirect()->route($route,['booking'=>$booking->id])->with('success', $msg);
        }
        $vehicle_info=$booking->consumer_vehicle;
        $consumer_profile_info=$booking->consumer_profile_info;
        $consumer_info=User::find($consumer_profile_info->user_id);
        $booking_services=$booking->booking_services;
        $booking_date=explode(" ",$booking->created_at);
        $booking_date=$booking_date[0];
        return view("consumer.booking.pending_status",get_defined_vars());
    }

    public function acceptBooking(Request $request)
    {
        $booking=Booking::find($request->booking);
        $booking->status="inspection";
        $booking->save();
        $consumer=Auth::user();
        $garage_name=$booking->garage_profile_info->name;
        $details = [
            'booking_id' => $booking->id,
            'garage_name' => $garage_name,
            'msg' => 'Booking #'.$booking->id.' has an update'
        ];
        $consumer->notify(new UpdateBooking($details));
        $garage_user=$booking->garage_profile_info->user;
        $garage_user->notify(new UpdateBooking($details));
        Session::flash("success","There has been an update to your booking");
        // {{$garage_name}}
        $consumer=consumer()->user;
        Mail::send('emails.consumer.request_confirmation',['user' => $consumer,'garage_name'=>$garage_name,'booking'=>$booking], function ($send) use($consumer,$booking){
            $send->to($consumer['email'])->subject('Booking '.$booking['id'].' confirmation ');
        });
        Mail::send('emails.garage.request_confirmation',['user' => $garage_user,'garage_name'=>$garage_name,'booking'=>$booking], function ($send) use($garage_user){
        $send->to($garage_user['email'])->subject('Booking Request Confirmation');
        });
        return redirect()->route('consumer.booking.inspection',['booking'=>$request->booking]);
    }

    public function inspectionStatus(Request $request)
    {
        $booking=Booking::find($request->booking);
        $result=checkForInspection($booking,"consumer");
        if(!empty($result)){
            $route=$result[0];
            // $msg=$result[1];
            $msg="There has been an update to your booking";

            return redirect()->route($route,['booking'=>$booking->id])->with('success', $msg);
        }
        $vehicle_info=$booking->consumer_vehicle;
        $consumer_profile_info=$booking->consumer_profile_info;
        $consumer_info=User::find($consumer_profile_info->user_id);
        $booking_services=$booking->booking_services;
        $booking_date=explode(" ",$booking->created_at);
        $booking_date=$booking_date[0];
        return view('consumer.booking.inspection_status',get_defined_vars());
    }

    public function in_progressStatus(Request $request)
    {

        $booking=Booking::find($request->booking);
        $result=checkForInProgress($booking,"consumer");
        if(!empty($result)){
            $route=$result[0];
            $msg="There has been an update to your booking";
            return redirect()->route($route,['booking'=>$booking->id])->with('success', $msg);
        }
        $vehicle_info=$booking->consumer_vehicle;
        $consumer_profile_info=$booking->consumer_profile_info;
        $consumer_info=User::find($consumer_profile_info->user_id);
        $booking_services=$booking->booking_services;
        $booking_date=explode(" ",$booking->created_at);
        $booking_date=$booking_date[0];
        $cd=$booking->completion_time;
        $td=date("Y-m-d");
        $to = Carbon::createFromFormat('Y-m-d', $td);
        $from = Carbon::createFromFormat('Y-m-d', $cd);
        $duration = $to->diffInDays($from);

        return view('consumer.booking.in_progress_status',get_defined_vars());
    }
    public function completeStatus(Request $request)
    {
        $flag=true;
        $booking=Booking::find($request->booking);
        $result=checkForComplete($booking,"consumer");
        if(!empty($result)){
            $route=$result[0];
            // $msg=$result[1];
            $msg="There has been an update to your booking";

            return redirect()->route($route,['booking'=>$booking->id])->with('success', $msg);
        }
        $vehicle_info=$booking->consumer_vehicle;
        $consumer_profile_info=$booking->consumer_profile_info;
        $consumer_info=User::find($consumer_profile_info->user_id);
        $booking_services=$booking->booking_services;
        $booking_date=explode(" ",$booking->created_at);
        $booking_date=$booking_date[0];
        if(!is_review_submit($booking->id))
        {
            $flag=false;
        }
        if($flag)
        {
            return view('consumer.booking.complete_status',get_defined_vars());  
        }else
        {
            return view('consumer.booking.feedback',get_defined_vars());  
        }
        
    }
    public function cancelStatus(Request $request)
    {
        $booking=Booking::find($request->booking);
        $result=checkForCancel($booking,"consumer");
        if(!empty($result)){
            $route=$result[0];
            // $msg=$result[1];
            $msg="There has been an update to your booking";

            return redirect()->route($route,['booking'=>$booking->id])->with('success', $msg);
        }
        $vehicle_info=$booking->consumer_vehicle;
        $consumer_profile_info=$booking->consumer_profile_info;
        $consumer_info=User::find($consumer_profile_info->user_id);
        $booking_services=$booking->booking_services;
        $booking_date=explode(" ",$booking->created_at);
        $booking_date=$booking_date[0];
        return view('consumer.booking.cancelled',get_defined_vars());
    }
    public function invoice(Request $request)
    {
        return view('consumer.booking.invoice',get_defined_vars());
    }

    public function decline_extension(Request $request,$booking_id)
    {
        $booking = Booking::find($booking_id);
        $booking->extension_status="declined";
        $booking->save();
        $message = array(
            'success' => 'You have declined extension',
        );
        return response()->json($message);
    }

    public function accept_extension(Request $request,$booking_id)
    {
        $booking = Booking::find($booking_id);
        $booking->extension_status="accepted";
        $booking->completion_time=$booking->extend_date;
        $booking->save();
        $cd=$booking->completion_time;
        $td=date("Y-m-d");
        $to = Carbon::createFromFormat('Y-m-d', $td);
        $from = Carbon::createFromFormat('Y-m-d', $cd);
        $duration = $to->diffInDays($from);
        $message = array(
            'success' => 'You have accepted extension request',
            'duration' => $duration
        );
        return response()->json($message);
    }
    public function next_to_cancel(Request $request)
    {
        $booking=Booking::find($request->booking);
        $cdate=Carbon::now();
        $booking->cancelled_date=$cdate;
        $booking->status="cancel";
        if(!empty($request->decline_reason))
        {
           $booking->decline_reason=$request->decline_reason;
       }
       $booking->save();
       $consumer=Auth::user();
       $garage_name=$booking->garage_profile_info->name;
       $garage_user=$booking->garage_profile_info->user;

       $details = [
        'booking_id' => $booking->id,
        'garage_name' => $garage_name,
        'msg' => 'Booking #'.$booking->id.' has been cancelled'
    ];
    $consumer->notify(new DeclineBookingRequest($details));
    $details2 = [
        'booking_id' => $booking->id,
        'garage_name' => $garage_name,
        'msg' => 'Consumer '.$consumer->name.' has cancelled booking',
    ];
    $garage_user->notify(new DeclineBookingRequest($details2));
    return redirect()->route("consumer.booking.cancel",["booking"=>$request->booking])->with("success","There has been an update to your booking");
    }

    public function save_report(Request $request)
    {
        $report = new Report();
        $report->user_id = Auth::user()->id;
        $report->booking_id = $request->booking;
        $report->description=$request->description;
        $report->status = "open";
        $report->save();
        return redirect()->back()->with("success","Reported successfully");
    }

    public function history(Request $req)
    {
        $cvehicle=ConsumerVehicle::find($req->vehicle);
        $bookings=$cvehicle->booking_vehciles->whereIn("status",["complete","cancel"]);
        return view('consumer.booking.history',get_defined_vars());
    }

    public function feedback(Request $req,$id=null)
    {
        $b=Booking::find($req->booking);
        $rec_id=$b->garage_profile_info->user->id;
        return view("consumer.booking.feedback",get_defined_vars());
    }

    public function save_feedback(Request $req,$id=null)
    {
        // dd($req->stars);
        $messages = [
            'rating.required' => 'Rate garage profile',
            'review.required' => 'Leave comment for garage profile',
        ];
        $rules = [
            'rating' => ['required'],
            'review' => ['required'],
        ];

        $this->validate($req,$rules,$messages);
        $feedback=Review::create(['booking_id'=>$req->booking_id,
            'consumer_profile_id'=>$req->consumer_profile_id,
            'garage_profile_id'=>$req->garage_profile_id,
            'rating'=>$req->rating,
            'review'=>$req->review,
            'user_id'=>auth()->user()->id]);
        return back()->with("success","Feedback sent successfully");
    }

}
