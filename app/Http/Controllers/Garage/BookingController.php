<?php

namespace App\Http\Controllers\Garage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Booking;
use Auth;
use App\ConsumerVehicle;
use App\ConsumerProfile;
use App\User;
use App\BookingImage;
use Carbon\Carbon;
use App\Report;
use App\Notifications\AcceptBookingRequest;
use App\Notifications\DeclineBookingRequest;
use App\Notifications\CompleteBooking;
use App\Notifications\UpdateBooking;
use Mail;
use App\Review;

class BookingController extends Controller
{

    public function index()
        {
            $bookings=garage()->garage_bookings;
            return view('garage.booking.booking_list', get_defined_vars());
        }


    public function pendingStatus(Request $request)
        {
            $booking=Booking::find($request->booking);
            $result=checkForPending($booking);
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
            return view("garage.booking.pending_status",get_defined_vars());
        }


    public function update_booking_price(Request $request)
        {
            $booking = Booking::find($request->booking_id);
            $booking_id=$request->booking_id;
            $booking->price=$request->price;
            $booking->inspection_quotation=$request->price;
            $booking->save();
            $consumer=$booking->consumer_profile_info->user;
            $consumer_name=$consumer->name;
            $garage_name=$booking->garage_profile_info->name;
            $details = [
            'booking_id' => $booking->id,
            'garage_name' => $garage_name,
            'msg' => 'Your booking request with '.$garage_name.' has been accepted'
            ];
            $consumer->notify(new AcceptBookingRequest($details));
            $details2 = [
                'booking_id' => $booking->id,
                'garage_name' => $garage_name,
                'msg' => 'You have accepted booking request from consumer '.$consumer->name,
            ];
            $garage_user=garage()->user;
            $garage_user->notify(new AcceptBookingRequest($details2));
            $message = array(
                'success' => 'You have updated your estimated price for this booking',
                'price'   => $booking->price,
                            );
            Mail::send('emails.garage.request_approved',['user' => $garage_user,'consumer_name'=>$consumer->name], function ($send) use($garage_user){
                $send->to($garage_user['email'])->subject('Booking Request Approved');
            });
            Mail::send('emails.consumer.request_approved',['user' => $consumer,'garage_name'=>$garage_name], function ($send) use($consumer){
                $send->to($consumer['email'])->subject('Your booking request has been approved');
            });
            return response()->json($message);
        }

    public function inspectionStatus(Request $request)
        {
            $booking=Booking::find($request->booking);
            $result=checkForInspection($booking);
            if(!empty($result))
            {
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
            return view('garage.booking.inspection_status',get_defined_vars());
        }

    public function in_progressStatus(Request $request)
        {
            $booking=Booking::find($request->booking);

            $result=checkForInProgress($booking);
            if(!empty($result))
            {
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
            $cd=$booking->completion_time;
            $td=date("Y-m-d");
            $to = Carbon::createFromFormat('Y-m-d', $td);
            $from = Carbon::createFromFormat('Y-m-d', $cd);
            $duration = $to->diffInDays($from);
            return view('garage.booking.in_progress_status',get_defined_vars());
        }

    public function completeStatus(Request $request)
    {
        $flag=true;
        $booking=Booking::find($request->booking);
        $result=checkForComplete($booking);
        if(!empty($result))
        {
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
            return view('garage.booking.complete_status',get_defined_vars()); 
        }else
        {
            return view('garage.booking.feedback',get_defined_vars());  
        }
        
    }

    public function cancelStatus(Request $request)
        {
            $booking=Booking::find($request->booking);
            $result=checkForCancel($booking);
            if(!empty($result))
            {
                $route=$result[0];
                // $msg=$result[1];
                $msg="There has been an update to your booking";
                return redirect()->route($route,['booking'=>$booking->id])->with('success', $msg);
            }
            $booking->status="cancel";
            $booking->save();
            $vehicle_info=$booking->consumer_vehicle;
            $consumer_profile_info=$booking->consumer_profile_info;
            $consumer_info=User::find($consumer_profile_info->user_id);
            $booking_services=$booking->booking_services;
            $booking_date=explode(" ",$booking->created_at);
            $booking_date=$booking_date[0];
            return view('garage.booking.cancelled',get_defined_vars());
        }


    public function invoice(Request $request)
        {
            return view('garage.booking.invoice',get_defined_vars());
        }


    public function update_inspection_mileag(Request $request)
        {
            $booking = Booking::find($request->booking_id);
            $booking_id=$request->booking_id;
            $booking->inspection_mileag=$request->inspection_mileag;
            $booking->save();
            $consumer=$booking->consumer_profile_info->user;
            Mail::send('emails.consumer.booking_update',['user' => $consumer,'booking_id'=>$booking->id], function ($send) use($consumer,$booking){
                $send->to($consumer['email'])->subject('Booking '.$booking['id'].' update');
            });
            $garage_user=garage()->user;
            Mail::send('emails.garage.booking_update',['user' =>$garage_user,'booking_id'=>$booking->id], function ($send) use($garage_user){
                $send->to($garage_user['email'])->subject('Booking Update');
            });
            $message = array(
                'success' => 'You have updated the mileage for this booking',
                'result'   => $booking->inspection_mileag,
            );
            return response()->json($message);
        }


    public function update_completion_time(Request $request)
        {
            $booking = Booking::find($request->booking_id);
            $booking_id=$request->booking_id;
            $booking->completion_time=$request->completion_time;
            $booking->save();
            $consumer=$booking->consumer_profile_info->user;
            Mail::send('emails.consumer.booking_update',['user' => $consumer,'booking_id'=>$booking->id], function ($send) use($consumer,$booking){
                $send->to($consumer['email'])->subject('Booking '.$booking['id'].' update');
            });
            $garage_user=garage()->user;
            Mail::send('emails.garage.booking_update',['user' =>$garage_user,'booking_id'=>$booking->id], function ($send) use($garage_user){
            $send->to($garage_user['email'])->subject('Booking Update');
            });
            $message = array(
                'success' => 'You have updated the expected completion date for this booking',
                'result'   => $booking->completion_time,
            );
            return response()->json($message);
        }


    public function update_inspection_quotation(Request $request)
        {
            $booking = Booking::find($request->booking_id);
            $booking_id=$request->booking_id;
            $booking->inspection_quotation=$request->inspection_quotation;
            $booking->save();
            $consumer=$booking->consumer_profile_info->user;
            Mail::send('emails.consumer.booking_update',['user' => $consumer,'booking_id'=>$booking->id], function ($send) use($consumer,$booking){
                $send->to($consumer['email'])->subject('Booking '.$booking['id'].' update');
            });
            $garage_user=garage()->user;
            Mail::send('emails.garage.booking_update',['user' =>$garage_user,'booking_id'=>$booking->id], function ($send) use($garage_user){
            $send->to($garage_user['email'])->subject('Booking Update');
            });
            $message = array(
                'success' => 'Quotation successfully',
                'result'   => $booking->inspection_quotation,
            );
            return response()->json($message);
        }


    public function save_inspection(Request $request)
        {
            $booking = Booking::find($request->booking_id);
            $booking->inspection_description=$request->inspection_description;
            $booking->save();
            if ($request->has('inspection_file'))
            {
                foreach($request->inspection_file as $image)
                {
                    $bookingImage=new BookingImage();
                    $bookingImage->booking_step="inspection";
                    $bookingImage->booking_id=$booking->id;
                    $bookingImage->image = uploadFile($image, 'inspection-galleries/'.rand().str_slug($booking->id));
                    $bookingImage->save();
                }
            }
            $consumer=$booking->consumer_profile_info->user;
            Mail::send('emails.consumer.booking_update',['user' => $consumer,'booking_id'=>$booking->id], function ($send) use($consumer,$booking){
                $send->to($consumer['email'])->subject('Booking '.$booking['id'].' update');
            });
            $garage_user=garage()->user;
            Mail::send('emails.garage.booking_update',['user' =>$garage_user,'booking_id'=>$booking->id], function ($send) use($garage_user){
                $send->to($garage_user['email'])->subject('Booking Update');
            });
            return redirect()->back()->with("success","You have updated the description of this booking");
        }


    public function save_progress(Request $request)
        {
            $booking = Booking::find($request->booking_id);
            $booking->progress_description=$request->progress_description;
            $booking->save();
            if ($request->has('progress_file')) {
                foreach($request->progress_file as $image)
                {
                    $bookingImage=new BookingImage();
                    $bookingImage->booking_step="in_progress";
                    $bookingImage->booking_id=$booking->id;
                    $bookingImage->image = uploadFile($image, 'in_progress-galleries/'.rand().str_slug($booking->id));
                    $bookingImage->save();
                }
            }
            $consumer=$booking->consumer_profile_info->user;
            Mail::send('emails.consumer.booking_update',['user' => $consumer,'booking_id'=>$booking->id], function ($send) use($consumer,$booking){
                $send->to($consumer['email'])->subject('Booking '.$booking['id'].' update');
            });
            $garage_user=garage()->user;
            Mail::send('emails.garage.booking_update',['user' =>$garage_user,'booking_id'=>$booking->id], function ($send) use($garage_user){
                $send->to($garage_user['email'])->subject('Booking Update');
            });
            return redirect()->back()->with("success","You have updated the description of this booking");
        }

    public function consumerProfile(Request $request)
        {
            $booking=Booking::find($request->booking);
            $consumer_profile_info=$booking->consumer_profile_info;
            return view('garage.booking.consumer_profile',get_defined_vars());
        }


    public function next_to_in_progress(Request $request)
        {
            $booking=Booking::find($request->booking);
            $booking->status="in_progress";
            $booking->save();
            $consumer=$booking->consumer_profile_info->user;
            $garage_name=$booking->garage_profile_info->name;
            $details = [
            'booking_id' => $booking->id,
            'garage_name' => $garage_name,
            'msg' => 'Booking #'.$booking->id.' has an update'
            ];
            $consumer->notify(new UpdateBooking($details));
            $garage_user=auth()->user();
            $garage_user->notify(new UpdateBooking($details));
            $consumer=$booking->consumer_profile_info->user;
            Mail::send('emails.consumer.booking_update',['user' => $consumer,'booking_id'=>$booking->id], function ($send) use($consumer,$booking){
                $send->to($consumer['email'])->subject('Booking '.$booking['id'].' update');
            });
            return redirect()->route("garage.booking.in_progress",["booking"=>$request->booking])->with('success','There has been an update to your booking');
        }

    public function next_to_complete(Request $request)
        {
            $booking=Booking::find($request->booking);
            $cdate=Carbon::now();
            $booking->completed_date=$cdate;
            $booking->status="complete";
            $booking->save();
            $consumer=$booking->consumer_profile_info->user;
            $garage_name=$booking->garage_profile_info->name;
            $details = [
            'booking_id' => $booking->id,
            'garage_name' => $garage_name,
            'msg' => 'Booking #'.$booking->id.' has been completed'
            ];
            $consumer->notify(new CompleteBooking($details));
            $garage_user=garage()->user;
            $garage_user->notify(new CompleteBooking($details));
            Mail::send('emails.garage.booking_complete',['user' => $garage_user,'consumer_name'=>$consumer->name,'booking_id'=>$booking->id], function ($send) use($garage_user){
                $send->to($garage_user['email'])->subject('Booking Complete');
            });
            Mail::send('emails.consumer.booking_complete',['user' => $consumer,'booking_id'=>$booking->id,'garage_name'=>$garage_name], function ($send) use($consumer,$booking){
                $send->to($consumer['email'])->subject('Your booking '.$booking['id'].' has been completed');
            });
            return redirect()->route("garage.booking.complete",["booking"=>$request->booking])->with('success','There has been an update to your booking');
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
            $consumer=$booking->consumer_profile_info->user;
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
                'msg' => 'You have cancelled booking with consumer '.$consumer->name,
            ];
            $garage_user->notify(new DeclineBookingRequest($details2));
            Mail::send('emails.garage.request_rejected',['user' => $garage_user,'garage_name'=>$garage_name], function ($send) use($garage_user){
            $send->to($garage_user['email'])->subject('Booking request rejected');
            });
            Mail::send('emails.consumer.request_rejected',['user' => $consumer,'garage_name'=>$garage_name], function ($send) use($consumer,$booking){
                $send->to($consumer['email'])->subject('Your booking '.$booking['id'].' has been cancelled');
                });
            return redirect()->route("garage.booking.cancel",["booking"=>$request->booking])->with('success','There has been an update to your booking');
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



    public function extension_request(Request $request)
        {
            $booking = Booking::find($request->booking_id);
            $booking_id=$request->booking_id;
            $booking->extend_date=$request->extend_date;
            $booking->extension_status="pending";
            $booking->save();
            $consumer=$booking->consumer_profile_info->user;
            $garage_user=garage()->user;
            Mail::send('emails.garage.booking_update',['user' =>$garage_user,'booking_id'=>$booking->id], function ($send) use($garage_user){
                $send->to($garage_user['email'])->subject('Booking Update');
            });
            Mail::send('emails.consumer.booking_update',['user' => $consumer,'booking_id'=>$booking->id], function ($send) use($consumer,$booking){
                $send->to($consumer['email'])->subject('Booking '.$booking['id'].' update');
            });
            $message = array(
                'success' => 'You have requested an extension to this booking',
                'extend_date'   => $booking->inspection_quotation,
            );
            return response()->json($message);
        }


    public function bookingHistory(Request $req)
    {
        $booking=Booking::find($req->booking);
        $bookings=garage()->garage_bookings->where("consumer_profile_id",$booking->consumer_profile_id)->whereIn("status",["complete","cancel"]);
        // dd($history);
        return view('garage.booking.booking_history', get_defined_vars());
    }

    public function save_feedback(Request $req,$id=null)
    {
        // dd($req->stars);
        $messages = [
            'review.required' => 'Leave comment for garage profile',
        ];
        $rules = [
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
