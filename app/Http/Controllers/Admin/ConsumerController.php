<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\ConsumerProfile;
use App\ConsumerVehicle;
use Auth;

class ConsumerController extends Controller
{
    public function index()
    {
        $consumers = User::whereRole('consumer')->get();
        return view('Admin.consumer.consumer', get_defined_vars());
    }

    public function profile($id)
    {
        $consumer = ConsumerProfile::find($id);
        return view('Admin.consumer.profile', get_defined_vars());
    }
}
