<?php

namespace App\Http\Controllers\Consumer;
use Auth;
use App\User;
use App\Profile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VehiclesController extends Controller
{
	public function index()
	{
		
		// // dd(GetImageFromUrl("https://cdn2.vdicheck.com/VehicleImages/Image.ashx?Id=30B7FF7B-422D-45A4-B6E7-E4F74BB949BF"));
		// $sourcecode = GetImageFromUrl("https://cdn2.vdicheck.com/VehicleImages/Image.ashx?Id=30B7FF7B-422D-45A4-B6E7-E4F74BB949BF");
	 //    $savefile = fopen(asset('consumer-vehicle-images2/') . "kashif.jpg", 'w');
	 //    fwrite($savefile, $sourcecode);
	 //    fclose($savefile);
	 //    dd("Ok image saved");

		$consumer_profile=Auth::user()->consumer_profile;
        $consumer_vehicles=$consumer_profile->consumer_vehicles;
		return view("consumer.vehicles.index",get_defined_vars());
	}
}