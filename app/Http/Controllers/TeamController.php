<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::orderBy('order', 'asc')->paginate(10);

        return view('backend.pages.teams.index', compact('teams'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:10048',
            'owner_name' => 'nullable|string|max:255',
            'gender' => 'required|string|in:Men,Women',
        ]);

        $data = $request->only(['name', 'city', 'owner_name', 'gender', 'order']);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('teams', 'public');
        }

        Team::create($data);

        return response()->json(['message' => 'Team added successfully!'], 200);
    }

    public function edit($id)
    {
        $team = Team::findOrFail($id);

        return response()->json($team);
    }

    public function update(Request $request, $id)
    {
        $team = Team::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
            'owner_name' => 'nullable|string|max:255',
            'gender' => 'required|string|in:Men,Women',
        ]);

        $data = $request->only(['name', 'city', 'owner_name', 'gender', 'order']);

        if ($request->hasFile('logo')) {
            if ($team->logo) {
                Storage::disk('public')->delete($team->logo);
            }
            $data['logo'] = $request->file('logo')->store('teams', 'public');
        }

        $team->update($data);

        return response()->json(['message' => 'Team updated successfully!'], 200);
    }

    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        if ($team->logo) {
            Storage::disk('public')->delete($team->logo);
        }
        $team->delete();

        return response()->json(['message' => 'Team deleted successfully!'], 200);
    }

    public function toggleStatus($id)
    {
        $team = Team::findOrFail($id);
        $team->status = ! $team->status;
        $team->save();

        return response()->json(['message' => 'Status updated!'], 200);
    }
}
