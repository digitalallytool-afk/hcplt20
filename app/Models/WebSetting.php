<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebSetting extends Model
{
    protected $fillable = [
        'site_name',
        'logo',
        'facebook_url',
        'instagram_url',
        'youtube_url',
        'twitter_url',
        'address',
        'phone',
        'email',
        'about_us_summary',
    ];
}
