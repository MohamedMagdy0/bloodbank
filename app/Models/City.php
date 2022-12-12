<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Governorate;
use App\Models\DonationRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{

    protected $table = 'cities';
    public $timestamps = true;
    protected $guarded = [] ;
    use softDeletes;
    // protected $fillable = array('id','name','governorate_id');



    // return $this->belongsTo(Category::class, 'cat_id');

    public function governorate()
    {
        return $this->belongsTo('App\Models\Governorate','governorate_id');
    }

    public function clients()
    {
        return $this->hasMany('App\Models\Client');
    }

    public function donationRequests()
    {
        return $this->hasMany('App\Models\DonationRequest');
    }

    // public function donationRequest()
    // {
    //     return $this->hasMany('App\Models\DonationRequest');
    // }

}
