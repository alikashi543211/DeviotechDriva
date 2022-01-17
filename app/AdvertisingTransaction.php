<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvertisingTransaction extends Model
{
    protected $fillable = [
        'garage_profile_id',
        'garage_advertising_id',
        'payment_id',
        'amount',
        'status',
    ];

    public function garage()
    {
        return $this->belongsTo('App\GarageProfile');
    }

    public function garage_advertising()
    {
        return $this->belongsTo('App\GarageAdvertising');
    }
}
