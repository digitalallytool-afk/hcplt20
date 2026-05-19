<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OwnerRegistration extends Model
{
    protected $fillable = [
        'brand_name',
        'contact_person',
        'phone_number',
        'email',
        'city_state',
        'profession',
        'financial_capacity',
        'preferred_team_name',
        'preferred_district',
        'prior_experience',
        'reason_to_own',
        'growth_plan',
        'special_requirements',
        'status',
        'remarks',
        'declaration_confirmed',
        'declaration_management'
    ];
}
