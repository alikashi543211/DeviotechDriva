<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public function booking()
    {
        return $this->belongsTo('App\Booking','booking_id','id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
