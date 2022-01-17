<?php

namespace App\Http\Controllers\Garage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        if(garage()->status != "approved" && garage()->is_verified == 0)
            return redirect()->route('garage.application.redirection');
        auth()->user()->unreadNotifications->markAsRead();
        $unread_count=auth()->user()->unreadNotifications()->count();
        $read_count=auth()->user()->readNotifications()->count();
        $notifications=auth()->user()->notifications()->limit(10)->get();
        return view('garage.dashboard.dashboard',get_defined_vars());
        
    }
    public function notifications()
    {
        auth()->user()->unreadNotifications->markAsRead();
        $notifications=auth()->user()->notifications;
        return view('garage.notifications.notifications',get_defined_vars());
    }

}
