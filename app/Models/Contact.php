<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{

    protected $table = 'contacts';
    public $timestamps = true;

    use softDeletes;

    protected $fillable = array('client_id', 'title_message', 'message');

    public function client()
    {
        return $this->belongsTo('App\Models\Client', 'client_id');
    }

}
