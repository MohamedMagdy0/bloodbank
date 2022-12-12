<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use  SoftDeletes;

    protected $table = 'posts';
    public $timestamps = true;
    protected $fillable = array('name', 'image', 'content', 'category_id');

    public function getIsFavouriteAttribute()
    {
        $user = auth('api')->user();
        if (!$user) {
            $user = auth('client-web')->user();
        }

        if ($user) {
            $check = $this->whereHas('clients', function ($query) use ($user) {
                $query->where('clients.id', $user->id);
            })->find($this->id);

            if ($check) {
                return true ;
            }
        }

        return false;
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function clients()
    {
        return $this->belongsToMany('App\Models\Client');
    }
}
