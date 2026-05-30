<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlayerProfile extends Model
{


    protected $guarded = [];
    
    protected $casts = [
        'payment_response' => 'array',
        'payment_date' => 'datetime',
        'dob' => 'date',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function trials()
    {
        return $this->belongsToMany(Trial::class, 'player_trials')
                    ->withPivot('trial_result', 'trial_status_date', 'trial_remark', 'id')
                    ->withTimestamps();
    }

    public function latestTrial()
    {
        return $this->belongsToMany(Trial::class, 'player_trials')
                    ->withPivot('trial_result', 'trial_status_date', 'trial_remark', 'id')
                    ->orderBy('player_trials.created_at', 'desc')
                    ->limit(1);
    }
}
