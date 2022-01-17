<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GarageProfileView extends Model
{
    public function garage_profile()
    {
        return $this->belongsTo('App\GarageProfile','garage_profile_id','id');
    }
}
