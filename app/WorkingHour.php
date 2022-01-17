<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkingHour extends Model
{
    //

    public function garage_profile()
    {
        return $this->belongsTo('\App\GarageProfile');
    }
}
