<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GaragePaymentType extends Model
{
    //
    public function payment_type()
    {
        return $this->belongsTo('App\PaymentType');
    }
}
