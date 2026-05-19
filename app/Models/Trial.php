<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trial extends Model
{
    protected $fillable = [
        'zone_name',
        'title',
        'venue',
        'date_text',
        'fee',
        'status',
        'registration_link',
        'is_active',
    ];
}
