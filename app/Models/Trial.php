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

    public function playerProfiles()
    {
        return $this->belongsToMany(PlayerProfile::class, 'player_trials')
                    ->withPivot('trial_result', 'trial_status_date', 'trial_remark', 'id')
                    ->withTimestamps();
    }
}
