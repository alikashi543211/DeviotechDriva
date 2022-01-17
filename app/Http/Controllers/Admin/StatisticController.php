<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Visitor;
use App\User;
use App\GarageAdvertising;
use Carbon\Carbon;
use DB;

class StatisticController extends Controller
{
    public function __construct()
    {
        $this->middleware("sub_admin");
    }
    public function statistics(Request $request)
    {
        if($request->ajax()){
            $datee = date("Y-m-d", strtotime($request->datee));
            $visitors_report = 'hour';
            $report_of = 'Today';
            $visitors_limit = 24;
            if($request->chart=='visitors_chart'){
                $visitors_vlable = Visitor::selectRaw("*,HOUR(created_at) as hour")->whereDate('created_at', $datee)->get();
                return view("admin.ajax.total_visit_chart",get_defined_vars());
            }elseif($request->chart=='register_chart' && $request->target_id=='consumer-chart'){
                $visitors_vlable = User::selectRaw("*,HOUR(created_at) as hour")->whereDate('created_at', $datee)->where('role','consumer')->get();
                return view("admin.ajax.consumer_chart",get_defined_vars());
            }elseif($request->chart=='register_chart' && $request->target_id=='garage-chart'){
                $visitors_vlable = User::selectRaw("*,HOUR(created_at) as hour")->whereDate('created_at', $datee)->where('role','garage')->get();
                return view("admin.ajax.garage_chart",get_defined_vars());
            }elseif($request->chart=='ads_chart'){
                $advertisements_vlable = GarageAdvertising::selectRaw("*,HOUR(created_at) as hour")
                    ->whereDate('created_at', $datee)
                    ->where('status','active')
                    ->get();
                return view("admin.ajax.ads_chart",get_defined_vars());
            }
        }
        $total_visitors = Visitor::sum('no_of_visits');
        $total_registered = User::count();
        $total_garages = User::where('role','garage')->count();
        $report = 'month';
        $report_of = 'Current Year';
        $limit = 12;
        $month_names = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
        $visitors = Visitor::selectRaw("*,YEAR(created_at) as year , MONTH(created_at) as month")->whereYear('created_at', Carbon::now()->year)->get();
        $consumers = User::selectRaw("*,YEAR(created_at) as year , MONTH(created_at) as month")->whereYear('created_at', Carbon::now()->year)->where('role','consumer')->get();
        $garages = User::selectRaw("*,YEAR(created_at) as year , MONTH(created_at) as month")->whereYear('created_at', Carbon::now()->year)->where('role','garage')->get();
        // default_monthly_advertisement_graph();
        $advertisements = GarageAdvertising::selectRaw("*,YEAR(created_at) as year , MONTH(created_at) as month")
            ->whereYear('created_at', Carbon::now()->year)
            ->where('status','active')
            ->get();
        // Advertisement Graph
        // $advertisementsGraph=advertisementsGraph($request);
        $advertisement_list=GarageAdvertising::all();
        return view('Admin.statistics.statistics',get_defined_vars());
    }

}
