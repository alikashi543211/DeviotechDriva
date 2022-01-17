<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Booking;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function index()
    {
        $bookings=Booking::all();
        return view('Admin.bookings.bookings',get_defined_vars());
    }

    public function detail(Request $request,$id=null)
    {
        $booking=Booking::find($id);
        $vehicle_info=$booking->consumer_vehicle;
        $cd=$booking->completion_time;

        if($booking->status=='pending')
        {
            return view('Admin.bookings.pending',get_defined_vars());
        }else if($booking->status=='inspection')
        {
            return view('Admin.bookings.inspection',get_defined_vars());
        }else if($booking->status=='in_progress')
        {
            $td=date("Y-m-d");
            $to = Carbon::createFromFormat('Y-m-d', $td);
            $from = Carbon::createFromFormat('Y-m-d', $cd);   
            $duration = $to->diffInDays($from);
            return view('Admin.bookings.in_progress',get_defined_vars());
        }else if($booking->status=='complete')
        {
            return view('Admin.bookings.complete',get_defined_vars());
        }else if($booking->status=='cancel')
        {
            return view('Admin.bookings.cancelled',get_defined_vars());
        }
    }

    public function consumerProfile($id=null)
    {
        $booking=Booking::find($id);
        $consumer_profile_info=$booking->consumer_profile_info;
        return view("Admin.bookings.consumer_profile",get_defined_vars());
    }
}
