<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingService extends Model
{
    public function booking()
    {
        return $this->belongsTo('App\BookingService','booking_id','id');
    }
}
