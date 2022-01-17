<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
	protected $guarded=[];
    public function booking()
    {
        return $this->belongsTo('App\Booking','booking_id');
    }

    public function consumer_profile()
    {
        return $this->belongsTo('App\ConsumerProfile','consumer_profile_id');
    }

    public function garage_profile()
    {
        return $this->belongsTo('App\GarageProfile','garage_profile_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
