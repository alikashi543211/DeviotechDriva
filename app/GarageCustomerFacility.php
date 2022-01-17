<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GarageCustomerFacility extends Model
{
    //

    public function customer_facility()
    {
        return $this->belongsTo('App\CustomerFacility');
    }
}
