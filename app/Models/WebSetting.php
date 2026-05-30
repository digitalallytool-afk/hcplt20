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
        'registration_actual_price',
        'registration_discounted_price',
        'registration_max_discount_players',
    ];
    
    // Helper method to get remaining slots
    public static function getRemainingDiscountSlots()
    {
        $setting = self::first();
        if (!$setting) return 0;
        
        $completed = \App\Models\PlayerProfile::where('payment_status', 'completed')->count();
        $remaining = $setting->registration_max_discount_players - $completed;
        
        return $remaining > 0 ? $remaining : 0;
    }

    // Helper method to get current dynamic price
    public static function getCurrentRegistrationPrice()
    {
        $setting = self::first();
        if (!$setting) return 2999;
        
        return self::getRemainingDiscountSlots() > 0 
            ? $setting->registration_discounted_price 
            : $setting->registration_actual_price;
    }
}
