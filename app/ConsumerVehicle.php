<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConsumerVehicle extends Model
{
    public function consumer_profile()
    {
        return $this->belongsTo('App\ConsumerProfile','consumer_profile_id','id');
    }
    public function booking_vehciles()
    {
        return $this->hasMany('App\Booking','consumer_vehicle_id','id');
    }
}
