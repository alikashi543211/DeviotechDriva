<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\GarageProfile;
use App\ConsumerProfile;
use App\ConsumerVehicle;
use Auth;
use App\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        $consumer_count = User::whereRole('consumer')->count();
        $garage_count = User::whereRole('garage')->count();
        $application_count = GarageProfile::whereStatus('pending')->count();
        $vehicle_count = ConsumerVehicle::count();
        $complete_booking_count=Booking::where("status","complete")->count();
        $in_progress_booking_count=Booking::where("status","in_progress")->count();
        $pending_booking_count=Booking::where("status","pending")->count();
        $cancel_booking_count=Booking::where("status","cancel")->count();
        return view('Admin.dashboard.dashboard', get_defined_vars());
    }

    public function consumer_count_chart(Request $request)
    {
        $report = 'day';
        $report_of = 'Last 7 days';
        $limit = 7;
        $days=getNDaysDates(7, 'Y-m-d');
        $start_day=$days[0];
        $end_day=$days[1];
        $total_consumers = User::selectRaw("*,WEEKDAY(created_at) as day")->whereBetween('created_at', [$start_day,$end_day]);
        $total_consumers=$total_consumers->where('role','consumer');
        $total_consumers_count=$total_consumers->count();
        $total_consumers=$total_consumers->orderBy('id','desc');
        $total_consumers=$total_consumers->get();
        return view("Admin.ajax.consumer_count_chart",get_defined_vars());
    }

    public function garage_count_chart(Request $request)
    {
        $report = 'day';
        $report_of = 'Last 7 days';
        $limit = 7;
        $days=getNDaysDates(7, 'Y-m-d');
        $start_day=$days[0];
        $end_day=$days[1];
        $total_garages = User::selectRaw("*,WEEKDAY(created_at) as day")->whereBetween('created_at', [$start_day,$end_day]);
        $total_garages=$total_garages->where('role','garage');
        $total_garages_count=$total_garages->count();
        $total_garages=$total_garages->orderBy('id','desc');
        $total_garages=$total_garages->get();
        return view("Admin.ajax.garage_count_chart",get_defined_vars());
    }

    public function new_app_count_chart(Request $request)
    {
        $report = 'day';
        $report_of = 'Last 7 days';
        $limit = 7;
        $days=getNDaysDates(7, 'Y-m-d');
        $start_day=$days[0];
        $end_day=$days[1];
        $new_applications = GarageProfile::selectRaw("*,WEEKDAY(created_at) as day")->whereBetween('created_at', [$start_day,$end_day]);
        $new_applications=$new_applications->where('status','submitted');
        $new_applications_count=$new_applications->count();
        $new_applications=$new_applications->orderBy('id','desc');
        $new_applications=$new_applications->get();
        return view("Admin.ajax.new_app_count_chart",get_defined_vars());
    }

    public function vehicles_count_chart(Request $request)
    {
        $report = 'day';
        $report_of = 'Last 7 days';
        $limit = 7;
        $days=getNDaysDates(7, 'Y-m-d');
        $start_day=$days[0];
        $end_day=$days[1];
        $total_vehicles = ConsumerVehicle::selectRaw("*,WEEKDAY(created_at) as day")->whereBetween('created_at', [$start_day,$end_day]);
        $total_vehicles_count=$total_vehicles->count();
        $total_vehicles=$total_vehicles->orderBy('id','desc');
        $total_vehicles=$total_vehicles->get();
        return view("Admin.ajax.vehicles_count_chart",get_defined_vars());
    }

    public function comp_booking_count_chart(Request $request)
    {
        $report = 'day';
        $report_of = 'Last 7 days';
        $limit = 7;
        $days=getNDaysDates(7, 'Y-m-d');
        $start_day=$days[0];
        $end_day=$days[1];
        $comp_bookings = Booking::selectRaw("*,WEEKDAY(created_at) as day")->whereBetween('created_at', [$start_day,$end_day]);
        $comp_bookings=$comp_bookings->where('status','complete');
        $comp_bookings_count=$comp_bookings->count();
        $comp_bookings=$comp_bookings->orderBy('id','desc');
        $comp_bookings=$comp_bookings->get();
        return view("Admin.ajax.booking.complete_count_chart",get_defined_vars());
    }

    public function in_progress_count_chart(Request $request)
    {
        $report = 'day';
        $report_of = 'Last 7 days';
        $limit = 7;
        $days=getNDaysDates(7, 'Y-m-d');
        $start_day=$days[0];
        $end_day=$days[1];
        $in_progress_bookings = Booking::selectRaw("*,WEEKDAY(created_at) as day")->whereBetween('created_at', [$start_day,$end_day]);
        $in_progress_bookings=$in_progress_bookings->where('status','in_progress');
        $in_progress_bookings_count=$in_progress_bookings->count();
        $in_progress_bookings=$in_progress_bookings->orderBy('id','desc');
        $in_progress_bookings=$in_progress_bookings->get();
        return view("Admin.ajax.booking.in_progress_count_chart",get_defined_vars());
    }

    public function pending_count_chart(Request $request)
    {
        $report = 'day';
        $report_of = 'Last 7 days';
        $limit = 7;
        $days=getNDaysDates(7, 'Y-m-d');
        $start_day=$days[0];
        $end_day=$days[1];
        $pending_bookings = Booking::selectRaw("*,WEEKDAY(created_at) as day")->whereBetween('created_at', [$start_day,$end_day]);
        $pending_bookings=$pending_bookings->where('status','pending');
        $pending_bookings_count=$pending_bookings->count();
        $pending_bookings=$pending_bookings->orderBy('id','desc');
        $pending_bookings=$pending_bookings->get();
        return view("Admin.ajax.booking.pending_count_chart",get_defined_vars());
    }

    public function cancel_count_chart(Request $request)
    {
        $report = 'day';
        $report_of = 'Last 7 days';
        $limit = 7;
        $days=getNDaysDates(7, 'Y-m-d');
        $start_day=$days[0];
        $end_day=$days[1];
        $cancel_bookings = Booking::selectRaw("*,WEEKDAY(created_at) as day")->whereBetween('created_at', [$start_day,$end_day]);
        $cancel_bookings=$cancel_bookings->where('status','cancel');
        $cancel_bookings_count=$cancel_bookings->count();
        $cancel_bookings=$cancel_bookings->orderBy('id','desc');
        $cancel_bookings=$cancel_bookings->get();
        return view("Admin.ajax.booking.cancel_count_chart",get_defined_vars());
    }

}
