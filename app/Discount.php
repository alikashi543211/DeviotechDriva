<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = [
        'garage_profile_id',
        'services',
        'message',
        'expiry_date',
        'status',
    ];

    public function garage()
    {
        return $this->belongsTo('App\GarageProfile');
    }
}
