<?php

namespace App\Http\Controllers\Garage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Booking;
use App\GarageProfile;
use App\GarageProfileView;
use App\SavedGarage;
use App\GarageAdvertising;

class StatisticController extends Controller
{
    public function __construct()
    {
        $this->middleware("sub_garage");
    }
    public function statistics()
    {
        // dd($complete_bookings);
        $complete_count=garage()->garage_bookings->where('status','complete')->count();
        $total_count=garage()->garage_bookings->count();
        $total_views=garage()->garage_views->sum("no_of_views");
        $advertisings = GarageAdvertising::where('garage_profile_id', garage()->id)->get();
        return view('garage.statistics.statistics',get_defined_vars());
    }

    public function followers() {
        $report = 'day';
        $report_of = 'Current Week';
        $limit = 7;
        $days=getNDaysDates(7, 'Y-m-d h:i');
        $start_day=$days[0];
        $end_day=$days[1];

        $saved_count = SavedGarage::selectRaw("*,WEEKDAY(created_at) as day")
            ->whereBetween('created_at', [$start_day, $end_day])
            ->where('garage_profile_id', garage()->id)
            ->orderBy('id','desc')
            ->get();

        $booking_count = Booking::selectRaw("*,WEEKDAY(created_at) as day")
            ->whereBetween('created_at', [$start_day, $end_day])
            ->where('garage_profile_id',garage()->id)
            ->distinct('consumer_profile_id')
            ->orderBy('id','desc')
            ->get();

        $count = collect($saved_count)->merge(collect($booking_count));

        return view('garage.ajax.followers_chart', get_defined_vars());
    }

    public function completeBooking()
    {

        $report = 'day';
        $report_of = 'Current Week';
        $limit = 7;
        $days=getNDaysDates(7, 'Y-m-d');
        $start_day=$days[0];
        $end_day=$days[1];

        $complete_bookings=Booking::selectRaw("*,WEEKDAY(completed_date) as day")->whereBetween('completed_date', [$start_day,$end_day]);
        $complete_bookings=$complete_bookings->where('garage_profile_id',garage()->id);
        $complete_bookings=$complete_bookings->orderBy('id','desc');
        $complete_bookings=$complete_bookings->get();

        return view("garage.ajax.complete_booking_chart",get_defined_vars());
    }

    public function profileViews(Request $req)
    {
        if(isset($req->chart) && $req->chart=="last_twenty_eight")
        {
            $report = 'day';
            $report_of = 'Last 28 Days';
            $limit = 28;
            $days=getNDaysDates(28, 'Y-m-d');
            $start_day=$days[0];
            $end_day=$days[1];
            $profile_views = GarageProfileView::selectRaw("*,WEEKDAY(created_at) as day")->whereBetween('created_at', [$start_day,$end_day]);
            $profile_views=$profile_views->where("garage_profile_id",garage()->id);
            $profile_views=$profile_views->get();
        }elseif(isset($req->chart) && $req->chart=="last_month")
        {
            $report = 'week';
            $report_of = 'Last Month';
            $limit = 4;
            $profile_views = GarageProfileView::selectRaw("*,MONTH(created_at) as month , CEILING(DAY(created_at)/7) as week")->whereMonth('created_at', Carbon::now()->subMonth()->month);
            $profile_views=$profile_views->where("garage_profile_id",garage()->id);
            $profile_views=$profile_views->get();
        }elseif(isset($req->chart) && $req->chart=="last_year")
        {
        $report = 'month';
        $report_of = 'Last Year';
        $limit = 12;
        $profile_views = GarageProfileView::selectRaw("*,YEAR(created_at) as year , MONTH(created_at) as month")->whereYear('created_at', Carbon::now()->year-1);
        $profile_views=$profile_views->where("garage_profile_id",garage()->id);
        $profile_views=$profile_views->get();
        }else{
        $report = 'day';
        $report_of = 'Last 7 days';
        $limit = 7;
        $days=getNDaysDates(7, 'Y-m-d');
        $start_day=$days[0];
        $end_day=$days[1];
        $profile_views = GarageProfileView::selectRaw("*,WEEKDAY(created_at) as day")->whereBetween('created_at',[$start_day,$end_day]);
        $profile_views=$profile_views->get();
        }
        return view("garage.ajax.profile_views_chart",get_defined_vars());
    }

    public function bookingStatistics(Request $req)
    {
        if(isset($req->chart) && $req->chart=="last_twenty_eight")
        {
        $report = 'day';
        $report_of = 'Last 28 Days';
        $limit = 28;
        $days=getNDaysDates(28, 'Y-m-d');
        $start_day=$days[0];
        $end_day=$days[1];

        $total_bookings = Booking::selectRaw("*,WEEKDAY(created_at) as day")->whereBetween('created_at', [$start_day,$end_day]);
        $total_bookings=$total_bookings->where('garage_profile_id',garage()->id);
        $total_bookings_count=$total_bookings->count();
        // return "Test Error ".$total_bookings_count;
        // $total_bookings=$total_bookings->orderBy('id','desc');
        $total_bookings=$total_bookings->get();

        $complete_bookings = Booking::selectRaw("*,WEEKDAY(completed_date) as day")->whereBetween('completed_date', [$start_day,$end_day]);
        $complete_bookings=$complete_bookings->where('garage_profile_id',garage()->id);
        $complete_bookings_count=$complete_bookings->count();
        // $complete_bookings=$complete_bookings->orderBy('id','desc');
        $complete_bookings=$complete_bookings->get();
        // return "Test Error ".$complete_bookings_count;
        }elseif(isset($req->chart) && $req->chart=="last_month")
        {
        $report = 'week';
        $report_of = 'Last Month';
        $limit = 4;

        $total_bookings = Booking::selectRaw("*,MONTH(created_at) as month , CEILING(DAY(created_at)/7) as week")->whereMonth('created_at', Carbon::now()->subMonth()->month);
        $total_bookings=$total_bookings->where('garage_profile_id',garage()->id);
        $total_bookings_count=$total_bookings->count();
        // return "Test Errror ".$total_bookings_count;
        // $total_bookings=$total_bookings->orderBy('id','desc');
        $total_bookings=$total_bookings->get();

        $complete_bookings = Booking::selectRaw("*,MONTH(completed_date) as month , CEILING(DAY(completed_date)/7) as week")->whereMonth('completed_date', Carbon::now()->subMonth()->month);
        $complete_bookings=$complete_bookings->where('garage_profile_id',garage()->id);
        $complete_bookings_count=$complete_bookings->count();
        // return "Test Errror ".$complete_bookings_count;
        // $complete_bookings=$complete_bookings->orderBy('id','desc');
        $complete_bookings=$complete_bookings->get();
        }elseif(isset($req->chart) && $req->chart=="last_year")
        {
            // return "Last Year";
        $report = 'month';
        $report_of = 'Last Year';
        $limit = 12;

        $total_bookings = Booking::selectRaw("*,YEAR(created_at) as year , MONTH(created_at) as month")->whereYear('created_at', Carbon::now()->year-1);
        $total_bookings=$total_bookings->where('garage_profile_id',garage()->id);
        $total_bookings_count=$total_bookings->count();
        // return "Last Year ".$total_bookings_count;
        $total_bookings=$total_bookings->orderBy('id','desc');
        $total_bookings=$total_bookings->get();
        // return "Last Year ".$total_bookings_count;

        $complete_bookings = Booking::selectRaw("*,YEAR(completed_date) as year , MONTH(completed_date) as month")->whereYear('completed_date', Carbon::now()->year-1);
        $complete_bookings=$complete_bookings->where('garage_profile_id',garage()->id);
        $complete_bookings_count=$complete_bookings->count();
        // return "Last Year ".$complete_bookings_count;
        $complete_bookings=$complete_bookings->orderBy('id','desc');
        $complete_bookings=$complete_bookings->get();
        } elseif(!isset($req->chart)){
        $report = 'day';
        $report_of = 'Last 7 days';
        $limit = 7;
        $days=getNDaysDates(7, 'Y-m-d');
        $start_day=$days[0];
        $end_day=$days[1];

        $total_bookings = Booking::selectRaw("*,WEEKDAY(created_at) as day")->whereBetween('created_at', [$start_day,$end_day]);
        $total_bookings=$total_bookings->where('garage_profile_id',garage()->id);
        $total_bookings_count=$total_bookings->count();
        $total_bookings=$total_bookings->orderBy('id','desc');
        $total_bookings=$total_bookings->get();

        $complete_bookings = Booking::selectRaw("*,WEEKDAY(completed_date) as day")->whereBetween('completed_date', [$start_day,$end_day]);
        $complete_bookings=$complete_bookings->where('garage_profile_id',garage()->id);
        $complete_bookings_count=$complete_bookings->count();
        $complete_bookings=$complete_bookings->orderBy('id','desc');
        $complete_bookings=$complete_bookings->get();
        }
        if($total_bookings_count>=$complete_bookings_count && $total_bookings_count!=0){
        $complete_percent=($complete_bookings_count/$total_bookings_count)*100;
        }else{
            $complete_percent=0;
        }
        // return "Test Error ".$complete_percent;
        $circle_percent=ceil((210*$complete_percent)/100);
        // return "Test Error ".$circle_percent;
        return view("garage.ajax.booking_statistics_chart",get_defined_vars());
    }
}
