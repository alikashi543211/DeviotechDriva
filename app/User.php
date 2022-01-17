<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function garage_profile()
    {
        return $this->hasOne('App\GarageProfile');
    }

    public function consumer_profile()
    {
        return $this->hasOne('App\ConsumerProfile');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
    public function reports()
    {
        return $this->hasMany('App\Report','user_id','id');
    }

    public function sub_garages()
    {
        return $this->hasMany('App\User','parent_id','id')->where('role','sub_garage')->orderBy("id",'desc');
    }

    public function sub_admins()
    {
        return $this->hasMany('App\User','parent_id','id')->where('role','sub_admin')->orderBy("id",'desc');
    }

    public function generateTwoFectorCode()
    {
        $this->two_factor_code=str_random(4);
        $this->save();
        return $this->two_factor_code;
    }

    public function ResetTwoFectorCode()
    {
        $this->two_factor_code=null;
        $this->two_factor_verified_at=null;
        $this->save();
    }

    public function reviews()
    {
        return $this->hasMany('App\Review','user_id');
    }
}
