<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function booking_services()
    {
    	return $this->belongsToMany('App\Service', 'booking_services', 'booking_id', 'service_id');
    }
    public function consumer_vehicle()
    {
        return $this->belongsTo('App\ConsumerVehicle','consumer_vehicle_id','id');
    }

    public function consumer_profile_info()
    {
        return $this->belongsTo('App\ConsumerProfile','consumer_profile_id','id');
    }

    public function garage_profile_info()
    {
        return $this->belongsTo('App\GarageProfile','garage_profile_id','id');
    }

    public function inspection_images()
    {
        return $this->hasMany('App\BookingImage','booking_id','id')->where("booking_step","inspection");
    }
    public function in_progress_images()
    {
        return $this->hasMany('App\BookingImage','booking_id','id')->where("booking_step","in_progress");
    }
    public function reports()
    {
        return $this->hasMany('App\Report','booking_id','id');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review','booking_id');
    }

}
