<?php

namespace App\Http\Controllers;

use App\Models\PlayerProfile;
use App\Models\Trial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssignTrialController extends Controller
{
    public function index()
    {
        $trials = Trial::where('is_active', 1)->orderBy('created_at', 'desc')->get();
        // Get unique states from player_profiles who have completed payment
        $states = PlayerProfile::where('payment_status', 'completed')
                    ->select('trial_state')
                    ->distinct()
                    ->whereNotNull('trial_state')
                    ->orderBy('trial_state')
                    ->pluck('trial_state');
                    
        return view('backend.pages.assign_trials.index', compact('trials', 'states'));
    }

    public function getDistricts(Request $request)
    {
        $state = $request->input('state');
        $districts = PlayerProfile::where('payment_status', 'completed')
                    ->where('trial_state', $state)
                    ->select('trial_district')
                    ->distinct()
                    ->whereNotNull('trial_district')
                    ->orderBy('trial_district')
                    ->pluck('trial_district');
                    
        return response()->json($districts);
    }

    public function getPlayers(Request $request)
    {
        $state = $request->input('state');
        $district = $request->input('district');
        $limit = $request->input('limit');
        $status = $request->input('status', 'unassigned'); // default to unassigned
        $playerIdStr = $request->input('player_id');
        $gender = $request->input('gender');

        $query = PlayerProfile::with('latestTrial')->orderBy('first_name', 'asc')->orderBy('last_name', 'asc');

        // If player_id is provided, ignore other filters for exact match
        if ($playerIdStr) {
            $query->where('player_id', $playerIdStr);
        } else {
            $query->where('payment_status', 'completed')
                  ->where('trial_state', $state);

            if ($status === 'unassigned') {
                $query->doesntHave('trials');
            } elseif ($status === 'assigned') {
                $query->has('trials');
            } // if 'all', do not filter by trial_id

            if ($district) {
                $query->where('trial_district', $district);
            }

            if ($gender) {
                $query->where('gender', $gender);
            }
        }

        $perPage = ($limit && $limit > 0) ? $limit : 50;
        $players = $query->paginate($perPage);

        // Transform collection to include 'trial' as the latest trial for UI compatibility
        $players->getCollection()->transform(function ($player) {
            $latest = $player->latestTrial->first();
            $player->trial = $latest ? (object) [
                'id' => $latest->id,
                'title' => $latest->title,
                'trial_result' => $latest->pivot->trial_result,
                'trial_status_date' => $latest->pivot->trial_status_date,
                'trial_remark' => $latest->pivot->trial_remark,
            ] : null;
            return $player;
        });

        return response()->json($players);
    }

    public function assign(Request $request)
    {
        $request->validate([
            'trial_id' => 'required|exists:trials,id',
            'player_ids' => 'required|array',
            'player_ids.*' => 'exists:player_profiles,id'
        ]);

        $trialId = $request->trial_id;

        DB::transaction(function () use ($request, $trialId) {
            $players = PlayerProfile::whereIn('id', $request->player_ids)->get();
            foreach ($players as $player) {
                // Use attach to ALWAYS create a new history record, even if it's the same trial
                $player->trials()->attach($trialId, [
                    'trial_result' => 'pending',
                ]);
            }
        });

        return response()->json([
            'success' => true,
            'message' => 'Trial assigned successfully to ' . count($request->player_ids) . ' players!'
        ]);
    }

    public function unassign(Request $request)
    {
        $request->validate([
            'player_ids' => 'required|array',
            'player_ids.*' => 'exists:player_profiles,id'
        ]);

        $skipped = 0;
        $unassigned = 0;

        DB::transaction(function () use ($request, &$skipped, &$unassigned) {
            $players = PlayerProfile::whereIn('id', $request->player_ids)->get();
            foreach ($players as $player) {
                if ($request->has('trial_id') && $request->trial_id) {
                    // Find ONLY the latest history record for this trial
                    $latestPivot = DB::table('player_trials')
                        ->where('player_profile_id', $player->id)
                        ->where('trial_id', $request->trial_id)
                        ->orderBy('created_at', 'desc')
                        ->first();
                        
                    if ($latestPivot) {
                        // Prevent unassigning if a result or remark is already added
                        if ($latestPivot->trial_result !== 'pending' || !empty($latestPivot->trial_remark)) {
                            $skipped++;
                            continue;
                        }
                        
                        DB::table('player_trials')->where('id', $latestPivot->id)->delete();
                        $unassigned++;
                    }
                } else {
                    // Safety fallback if no trial is selected
                    $skipped++;
                }
            }
        });

        $message = "Trials unassigned from $unassigned players.";
        if ($skipped > 0) {
            $message .= " ($skipped skipped because their results are already recorded!)";
        }

        return response()->json([
            'success' => true,
            'message' => $message
        ]);
    }

    public function updateResult(Request $request)
    {
        $request->validate([
            'player_id' => 'required|exists:player_profiles,id',
            'trial_result' => 'required|in:pending,success,failed',
            'trial_remark' => 'nullable|string|max:1000'
        ]);

        $player = PlayerProfile::with('latestTrial')->find($request->player_id);
        $latestTrial = $player->latestTrial->first();

        if ($latestTrial) {
            // Create a brand new history record instead of updating the old one
            $player->trials()->attach($latestTrial->id, [
                'trial_result' => $request->trial_result,
                'trial_status_date' => now()->toDateString(),
                'trial_remark' => $request->trial_remark,
                'created_at' => now(),
                'updated_at' => now()
            ]);
                
            return response()->json([
                'success' => true,
                'message' => 'New status update recorded successfully for ' . $player->first_name
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'No assigned trial found for this player to update.'
        ], 400);
    }

    public function playerHistory($id)
    {
        $player = PlayerProfile::with(['trials' => function($query) {
            $query->orderBy('player_trials.created_at', 'desc');
        }])->findOrFail($id);

        $history = $player->trials->map(function ($trial) {
            return [
                'title' => $trial->title,
                'venue' => $trial->venue,
                'date_text' => $trial->date_text,
                'zone_name' => $trial->zone_name,
                'result' => $trial->pivot->trial_result,
                'status_date' => $trial->pivot->updated_at ? $trial->pivot->updated_at->format('M d, Y h:i A') : ($trial->pivot->trial_status_date ?? 'N/A'),
                'remark' => $trial->pivot->trial_remark,
                'assigned_on' => $trial->pivot->created_at ? $trial->pivot->created_at->format('M d, Y h:i A') : 'N/A'
            ];
        });

        return response()->json([
            'success' => true,
            'player_name' => $player->first_name . ' ' . $player->last_name,
            'player_id_string' => $player->player_id ?? $player->id,
            'history' => $history
        ]);
    }
}
