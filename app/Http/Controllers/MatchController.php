<?php

namespace App\Http\Controllers;

use App\Models\MatchSchedule;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function index()
    {
        $matches = MatchSchedule::orderBy('created_at', 'desc')->get();
        return view('backend.pages.matches.index', compact('matches'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'team_a' => 'required|string|max:255',
            'team_b' => 'required|string|max:255',
            'date_text' => 'required|string|max:255',
            'venue' => 'nullable|string|max:255',
            'score' => 'nullable|string|max:255',
            'status' => 'required|string|max:50',
        ]);

        MatchSchedule::create($request->all());

        return response()->json(['success' => true, 'message' => 'Match added successfully!']);
    }

    public function edit(MatchSchedule $match)
    {
        return response()->json($match);
    }

    public function update(Request $request, MatchSchedule $match)
    {
        $request->validate([
            'team_a' => 'required|string|max:255',
            'team_b' => 'required|string|max:255',
            'date_text' => 'required|string|max:255',
            'venue' => 'nullable|string|max:255',
            'score' => 'nullable|string|max:255',
            'status' => 'required|string|max:50',
        ]);

        $match->update($request->all());

        return response()->json(['success' => true, 'message' => 'Match updated successfully!']);
    }

    public function destroy(MatchSchedule $match)
    {
        $match->delete();
        return response()->json(['success' => true, 'message' => 'Match deleted successfully!']);
    }
}
