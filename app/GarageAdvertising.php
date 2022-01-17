<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GarageAdvertising extends Model
{
    protected $fillable = [
        'garage_profile_id',
        'order_no',
        'plan',
        'days',
        'amount',
        'start_date',
        'end_date',
        'status',
    ];

    public function garage()
    {
        return $this->belongsTo('App\GarageProfile','garage_profile_id');
    }

    public function advertising_transation()
    {
        return $this->belongsTo('App\AdvertisingTransaction','garage_advertising_id');
    }
}
