<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatchSchedule extends Model
{
    protected $fillable = [
        'team_a',
        'team_b',
        'date_text',
        'venue',
        'score',
        'status',
    ];
}
