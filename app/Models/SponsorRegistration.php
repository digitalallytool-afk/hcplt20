<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SponsorRegistration extends Model
{
    protected $fillable = [
        'company_name',
        'contact_person',
        'phone_number',
        'email',
        'city_region',
        'category',
        'budget',
        'hear_about_us',
        'comments',
        'status',
        'remarks'
    ];
}
