<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->role=="admin" || auth()->user()->role=="sub_admin")
        {
            return redirect()->route("admin.dashboard");
        }
        elseif(auth()->user()->role=="garage" || auth()->user()->role=="sub_garage") {
            return redirect()->route("garage.dashboard");
        }
        elseif(auth()->user()->role=="consumer") {
            return redirect()->route("consumer.dashboard");
        }
    }
}
