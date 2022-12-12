<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;



class Client extends Authenticatable
{
    use softDeletes;

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('password', 'email', 'is_active', 'd_o_b','blood_type_id','last_donation_date','city_id','governorate_id', 'pin_num', 'name','phone','api_token');



    public function bloodType()
    {
        return $this->belongsTo('App\Models\BloodType','blood_type_id');
    }

    public function governorate()
    {
        return $this->belongsTo('App\Models\Governorate','governorate_id');
    }

    public function donationRequests()
    {
        return $this->hasMany('App\Models\DonationRequest');
    }
    public function city()
    {
        return $this->belongsTo('App\Models\City','city_id');
    }

    public function bloodTypes()
    {
        return $this->belongsToMany('App\Models\BloodType');
    }

    public function governorates()
    {
        return $this->belongsToMany('App\Models\Governorate'); //  ,'client_governorate','client_id'
    }

    public function contacts()
    {
        return $this->hasMany('App\Models\Contact');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post');
    }

    public function notifications()
    {
        return $this->belongsToMany('App\Models\Notification');
    }

    public function tokens()
    {
        return $this->hasMany('App\Models\Token');
    }


protected $hidden = [
        'password',
        'api_token',
    ];


}
