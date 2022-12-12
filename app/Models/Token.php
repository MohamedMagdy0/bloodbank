<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;
        protected $fillable = array('token', 'type', 'client_id');



    public function client()
    {
        return $this->belongsTo('App\Models\Client', 'client_id');
    }


}
