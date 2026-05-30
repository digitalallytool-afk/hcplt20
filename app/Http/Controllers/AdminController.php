<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class AdminController extends Controller
{
    public function index(){ 
        // 1. Stats
        $totalPlayers = \App\Models\PlayerProfile::count();
        $verifiedPlayers = \App\Models\PlayerProfile::where('payment_status', 'completed')->count();
        $upcomingTrials = \App\Models\Trial::where('is_active', 1)->count();
        $totalRevenue = $verifiedPlayers * 999; // Assuming ₹999 per registration for now

        // 2. Recent Activity Feed
        // Fetch latest 6 players based on updated_at to get recent registrations or payments
        $recentActivities = \App\Models\PlayerProfile::orderBy('updated_at', 'desc')->limit(6)->get();

        // 3. League Health Metrics
        $trialAssignmentRate = 0;
        $paymentConversionRate = 0;
        
        if ($verifiedPlayers > 0) {
            $assignedPlayers = \App\Models\PlayerProfile::where('payment_status', 'completed')->has('trials')->count();
            $trialAssignmentRate = round(($assignedPlayers / $verifiedPlayers) * 100);
        }

        if ($totalPlayers > 0) {
            $paymentConversionRate = round(($verifiedPlayers / $totalPlayers) * 100);
        }

        return view('backend.pages.dashboard', compact(
            'totalPlayers', 
            'verifiedPlayers', 
            'upcomingTrials', 
            'totalRevenue',
            'recentActivities',
            'trialAssignmentRate',
            'paymentConversionRate'
        ));
    }

    public function cms(){ 

        return view('backend.pages.cms');

    }


    public function league(){ 

        return view('backend.pages.league');
    }

    public function trial(){ 

        return view('backend.pages.trial');


    }

    public function player(Request $request){ 
        $query = \App\Models\PlayerProfile::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('player_id', 'like', "%{$search}%")
                  ->orWhere('phone_number', 'like', "%{$search}%");
            });
        }

        if ($request->filled('role') && $request->role != 'All Roles') {
            $query->where('player_role', $request->role);
        }

        if ($request->filled('gender') && $request->gender != 'All Genders') {
            $query->where('gender', $request->gender);
        }

        if ($request->filled('export') && $request->export == 'csv') {
            return $this->exportPlayersCsv($query);
        }

        $players = $query->orderBy('id', 'desc')->paginate(15)->appends($request->all());
        
        $totalPlayers = \App\Models\PlayerProfile::count();
        $verifiedPlayers = \App\Models\PlayerProfile::where('payment_status', 'completed')->count();
        $pendingPlayers = \App\Models\PlayerProfile::where('payment_status', 'pending')->orWhereNull('payment_status')->count();
        
        return view('backend.pages.player-management', compact('players', 'totalPlayers', 'verifiedPlayers', 'pendingPlayers', 'request'));
    }

    private function exportPlayersCsv($query) {
        $players = $query->get();
        $filename = "players_" . date('Y-m-d_H-i-s') . ".csv";

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = ['Player ID', 'First Name', 'Last Name', 'Gender', 'Date of Birth', 'Role', 'Age Category', 'Phone Number', 'Alt Phone', 'State', 'District', 'Trial State', 'Trial District', 'Payment Status', 'Registration Date'];

        $callback = function() use($players, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($players as $player) {
                $row['Player ID']  = $player->player_id;
                $row['First Name'] = $player->first_name;
                $row['Last Name']  = $player->last_name;
                $row['Gender']  = $player->gender;
                $row['Date of Birth'] = $player->dob;
                $row['Role']  = $player->player_role;
                $row['Age Category']  = $player->age_category;
                $row['Phone Number']  = $player->phone_number;
                $row['Alt Phone']  = $player->alternate_phone_number;
                $row['State']  = $player->state;
                $row['District']  = $player->district;
                $row['Trial State']  = $player->trial_state;
                $row['Trial District']  = $player->trial_district;
                $row['Payment Status']  = $player->payment_status;
                $row['Registration Date']  = $player->created_at->format('Y-m-d');

                fputcsv($file, array($row['Player ID'], $row['First Name'], $row['Last Name'], $row['Gender'], $row['Date of Birth'], $row['Role'], $row['Age Category'], $row['Phone Number'], $row['Alt Phone'], $row['State'], $row['District'], $row['Trial State'], $row['Trial District'], $row['Payment Status'], $row['Registration Date']));
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function updatePlayer(Request $request, $id) {
        $player = \App\Models\PlayerProfile::findOrFail($id);
        
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'phone_number' => 'required|string|max:15',
            'player_role' => 'required|string',
            'state' => 'required|string',
            'district' => 'required|string',
        ]);

        $player->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'player_role' => $request->player_role,
            'state' => $request->state,
            'district' => $request->district,
        ]);

        return redirect()->back()->with('success', 'Player profile updated successfully.');
    }

     public function media(){ 

          return view('backend.pages.media');

    }


}
