<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class MarketingController extends Controller
{
    public function consumer()
    {
        $consumers = User::where('role', 'consumer')->get();
        return view('Admin.marketing.consumers', get_defined_vars());
    }

    public function garage()
    {
        $garages = User::where('role', 'garage')->get();
        return view('Admin.marketing.garage', get_defined_vars());
    }
}
