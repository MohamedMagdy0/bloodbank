<?php

namespace App\Models;

use App\Models\City;
use App\Models\Client;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Governorate extends Model
{

    protected $table = 'governorates';
    public $timestamps = true;
        use softDeletes;

    protected $fillable = array('name');



    public function donationRequests()
    {
        return $this->hasMany('App\Models\DonationRequest');
    }


    public function cities()
    {
        return $this->hasMany('App\Models\City');
    }

    public function client()
    {
        return $this->hasMany('App\Models\Client');
    }

    public function clients()
    {
        return $this->belongsToMany('App\Models\Client');
    }

}
