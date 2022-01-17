<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SavedGarage extends Model
{
	protected $guarded = [];
    public function consumer_profile()
    {
    	return $this->belongsTo('App\ConsumerProfile', 'consumer_profile_id', 'id');
    }
    public function garage_profile()
    {
    	return $this->belongsTo('App\GarageProfile', 'garage_profile_id', 'id');
    }
}
