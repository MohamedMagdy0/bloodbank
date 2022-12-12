<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{

    protected $table = 'settings';
    public $timestamps = true;
    use  SoftDeletes;

    protected $fillable = array('about_app_text','whatsapp_link', 'market_text', 'contact_phone', 'about_us_text','contact_email','contact_fax', 'notification_setting_text', 'fb_link', 'insta_link', 'tw_link', 'youtube_link');

}
