<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class BloodType extends Model
{

    protected $table = 'blood_types';
    public $timestamps = true;

    use softDeletes;

    protected $fillable = array('name');

    public function client()
    {
        return $this->hasMany('App\Models\Client');
    }

    public function donationRequest()
    {
        return $this->hasMany('App\Models\DonationRequest');
    }

    public function clients()
    {
        return $this->belongsToMany('App\Models\Client');
    }



}
