<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class DonationRequest extends Model
{

    protected $table = 'donation_requests';
    public $timestamps = true;

    use softDeletes;

    protected $fillable = array('patient_name', 'hospital_name', 'hospital_address', 'details', 'governorate_id', 'city_id', 'blood_type_id', 'patient_age', 'bags_num', 'patient_phone', 'latitude', 'longitude', 'notes', 'client_id');

    public function client()
    {
        return $this->belongsTo('App\Models\Client', 'client_id');
    }
    public function city()
    {
        return $this->belongsTo('App\Models\City', 'city_id');
    }

    public function bloodType()
    {
        return $this->belongsTo('App\Models\BloodType', 'blood_type_id');
    }

    public function governorate()
    {
        return $this->belongsTo('App\Models\Governorate', 'governorate_id');
    }

    public function notification()
    {
        return $this->hasOne('App\Models\Notification');
    }

}
