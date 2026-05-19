<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'name',
        'city',
        'logo',
        'owner_name',
        'order',
        'status',
    ];

    public function members()
    {
        return $this->hasMany(TeamMember::class);
    }
}
