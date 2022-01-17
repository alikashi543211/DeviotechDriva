<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\GarageProfile;

class GarageController extends Controller
{
    public function index()
    {
    	$garages=GarageProfile::all();
        return view("front.garage.index",get_defined_vars());
    }
}
