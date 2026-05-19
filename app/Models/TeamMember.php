<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable = [
        'team_id',
        'name',
        'role',
        'origin',
        'image',
        'emoji',
        'order',
        'status'
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
