<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service;
use App\GarageProfile;
use App\GarageKeyword;
use App\CustomerFacility;
use App\PaymentType;
use Session;
use App\SavedGarage;
use App\Review;
// remove record classes
use DB;
use App\BookingService;
use App\GarageAdvertising;
use App\GarageCustomerFacility;
use App\GaragePaymentType;
use App\GarageProfileView;

class FrontController extends Controller
{
    public function index(Request $req)
    {
        $list = approved_garages()->orderBy('id', 'desc')->take(4)->get();
        $service_list = Service::get();
        return view("front.index", get_defined_vars());
    }
    
    public function deleteGaragesRecord()
    {
        DB::table("users")->where("role", "garage")->delete();
        DB::table("garage_profiles")->where('id', '!=', "0")->delete();
        DB::table("garage_services")->where('id', '!=', "0")->delete();
        DB::table("garage_keywords")->where('id', '!=', "0")->delete();
        DB::table("bookings")->where('id', '!=', "0")->delete();
        DB::table("booking_images")->where('id', '!=', "0")->delete();
        BookingService::where("id", "!=", "0")->delete();
        GarageAdvertising::where("id", "!=", "0")->delete();
        GarageCustomerFacility::where("id", "!=", "0")->delete();
        GaragePaymentType::where("id", "!=", "0")->delete();
        GarageProfileView::where("id", "!=", "0")->delete();
        SavedGarage::where("id", "!=", "0")->delete();
        dd("Garages Successfully Deleted");
    }

    public function load_keyword(Request $req)
    {
        $query = $req->keyword;
        $garage_profiles = approved_garages()
            ->orderByRaw('CHAR_LENGTH(name)')
            ->where('name', 'LIKE', "{$query}%")
            ->orWhere('description', 'LIKE', "{$query}%")
            ->pluck('name')->toArray();

        $garage_keywords = GarageKeyword::orderByRaw('CHAR_LENGTH(keyword)')->select("keyword")->where('keyword', 'LIKE', "{$query}%")->pluck('keyword')
            ->toArray();
        $keywords = array_unique (array_merge($garage_keywords, $garage_profiles));
        $items="";
        $i=0;
        foreach($keywords as $item)
        {
            if($req->keyword != $item)
            {
                continue;
            }
            $items.='<div style="text-transform: capitalize;" key="keyword" class="item">'.$item.'</div>';
            $i=$i+1;
        }
        foreach($keywords as $item)
        {
            if($i == 7 || $req->keyword == $item)
            {
                continue;
            }
            $items.='<div style="text-transform: capitalize;" key="keyword" class="item">'.$item.'</div>';
            $i=$i+1;
        }
        $items.='<div class="suggest_keyword_placeholder_box d-block">Keyword or garage name</div></div>';
        $count_items = sizeof($keywords);
        if($count_items == 0)
        {
            $result = false;
        }else
        {
            $result = true;
        }
        $msg = ['items' => $items, 'result' => $result];
        return response()->json($msg);
    }

    public function garage_list(Request $req)
    {
        $garages_list = search_by_location($req);
        $garages_list = search_by_keywords($garages_list, $req);
        if(isset($req->filter))
        {
            $garages_list = search_by_filter($garages_list, $req);
        }
        $garage_ids = $garages_list->pluck('id')->toArray();
        $garages_list = approved_garages()->whereIn('id', $garage_ids);

        $total_garages = $garages_list->count();
        $garages = $garages_list->paginate(5);
        
        return view('front.garage_list', get_defined_vars());
    }

    public function garage_detail(Request $req,$slug=null)
    {
        $show_all = false;
        $back_url = url()->previous();
        $back_url = explode("?", $back_url)[0];
        $garage = GarageProfile::where('slug', $slug)->first();
        $garage_address = explode(",", $garage->address);
        if(is_array($garage_address))
        {
            $postal_town_index = count($garage_address) - 2;
            $garage_postal_town = $garage_address[$postal_town_index];
        }else
        {
            $garage_postal_town = "";
        }
        if(!isset($req->show))
        {
            $reviews_list = Review::where('garage_profile_id', $garage->id)
                ->where('user_id', '!=', $garage->user->id)
                ->take(5)
                ->get();
            $count = Review::where('garage_profile_id', $garage->id)
                ->where('user_id', '!=', $garage->user->id)
                ->count();
            if($count > 5)
            {
                $show_all = true;
            }
        }
        else
        {
            $reviews_list = Review::where('garage_profile_id', $garage->id)
                ->where('user_id', '!=', $garage->user->id)       
                ->get();
        }
        return view("front.garage_detail", get_defined_vars());
    }

    public function save_garage(Request $req)
    {
        \DB::statement("SET foreign_key_checks = 0");
        if(!saved_garage($req->garage_id))
        {
            SavedGarage::create(['garage_profile_id' => $req->garage_id,
                'consumer_profile_id' => consumer()->id]);
            return response()->json(['result' => true, 'msg' => 'Profile added to your saved list']);
        }else
        {
            SavedGarage::where("consumer_profile_id", consumer()->id)->where("garage_profile_id", $req->garage_id)->delete();
            return response()->json(['result' => false,'msg' => 'Profile removed from your saved list']);
        }

    }
}
