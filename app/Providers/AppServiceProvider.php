<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Ticket;
use App\Service;
use App\CustomerFacility;
use App\GarageProfile;
use App\PaymentType;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // advertisingCroneJob();
        // updateGarageProfilesRadius();
        Schema::defaultStringLength(191);
        view()->composer(['consumer.includes.header', 'front.components.header_detail'], function ($view) {
            $view->with([
                'unread_notifications_counter' => auth()->user()->unreadNotifications()->count(),
                'unread_notifications' => auth()->user()->unreadNotifications()->limit(5)->get(),
                'available_status' => auth()->user()->consumer_profile->available_status,
            ]);
        });
        view()->composer('garage.includes.header', function ($view) {
            $view->with([
                'unread_notifications_counter' => auth()->user()->unreadNotifications()->count(),
                'unread_notifications' => auth()->user()->unreadNotifications()->limit(5)->get(),
                'available_status' => ucfirst(auth()->user()->garage_profile->available_status),
            ]);
        });
        view()->composer('consumer.support.layout.master', function ($view) {
            $view->with([
                'closed_tickets_count' => Ticket::whereUserId(auth()->user()->id)->where('status','closed')->count(),
                'open_tickets_count' => Ticket::whereUserId(auth()->user()->id)->where('status','open')->count(),
                'recent_tickets'  =>  Ticket::whereUserId(auth()->user()->id)->orderBy('id','desc')->take(5)->get(),
            ]);
        });
        view()->composer(['front.garage_list','front.garage_detail'], function ($view) {
            $view->with([
                'service_list' => Service::all(),
                'facility_list' => CustomerFacility::all(),
                'payment_list' => PaymentType::all(),
            ]);
        });

    }
}
