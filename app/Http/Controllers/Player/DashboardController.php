<?php

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $profile = \App\Models\PlayerProfile::with(['trials' => function($q) {
            $q->orderBy('player_trials.created_at', 'desc');
        }])->where('user_id', auth()->id())->first();
        
        return view('player.dashboard', compact('profile'));
    }
}
