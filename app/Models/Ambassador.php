<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ambassador extends Model
{
    protected $fillable = [
        'name',
        'designation',
        'image',
        'order',
        'status',
    ];
}
