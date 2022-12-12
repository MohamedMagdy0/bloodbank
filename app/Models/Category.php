<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    protected $table = 'categories';
    public $timestamps = true;
    use softDeletes;
    protected $fillable = array('name');

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

}
