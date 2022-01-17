<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConsumerProfile extends Model
{
    //
    public function user()
	{
		return $this->belongsTo('App\User');
    }

    public function consumer_vehicles()
    {
        return $this->hasMany('App\ConsumerVehicle','consumer_profile_id','id');
    }
    public function garage_bookings()
    {
        return $this->hasMany('App\Booking','consumer_profile_id','id');
    }
    public function saved_garages()
    {
        return $this->hasMany('App\SavedGarage');
    }
    public function reviews()
    {
        return $this->hasMany('App\Review','consumer_profile_id');
    }
}
