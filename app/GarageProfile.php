<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GarageProfile extends Model
{
    protected $fillable = [
        'user_id', 'name', 'address', 'address_lat', 'address_long', 'pretty_address', 'user_contact', 'contact_1', 'contact_2', 'website',
        'registration_number', 'description', 'vat_registration', 'logo', 'verification_code', 'status', 'registration_step', 'uk_postcode','is_verified', 'is_featured'
    ];

	public function user()
	{
		return $this->belongsTo('App\User');
	}

    public function garage_services()
    {
    	return $this->hasMany('App\GarageService');
    }

    public function saved_garages()
    {
        return $this->hasMany('App\SavedGarage');
    }

    public function garage_customer_facilities()
    {
    	return $this->hasMany('App\GarageCustomerFacility');
    }

    public function garage_keywords()
    {
    	return $this->hasMany('App\GarageKeyword');
    }

    public function garage_payment_types()
    {
    	return $this->hasMany('App\GaragePaymentType');
    }

    public function garage_images()
    {
    	return $this->hasMany('App\GarageImage');
    }

    public function working_hours()
    {
    	return $this->hasMany('App\WorkingHour');
    }

    public function garage_bookings()
    {
        return $this->hasMany('App\Booking', 'garage_profile_id', 'id');
    }

    public function booking_services()
    {
        return $this->belongsToMany('App\Service', 'booking_services', 'booking_id', 'service_id');
    }

    public function garage_views()
    {
        return $this->hasMany('App\GarageProfileView','garage_profile_id','id');
    }

    public function discounts()
    {
    	return $this->hasMany('App\Discount');
    }

    public function garage_advertisings()
    {
        return $this->hasMany('App\GarageAdvertising');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review','garage_profile_id');
    }

    // public function booking_history($consumer_profile_id)
    // {
    //     return $this->hasMany('App\Booking', 'garage_profile_id', 'id')->where("consumer_profile_id",$consumer_profile_id);
    // }
}
