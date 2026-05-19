<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamMemberController extends Controller
{
    public function index()
    {
        $teams = Team::orderBy('name', 'asc')->get();
        $members = TeamMember::with('team')->orderBy('team_id', 'asc')->orderBy('order', 'asc')->paginate(15);
        return view('backend.pages.team_members.index', compact('members', 'teams'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'team_id' => 'required|exists:teams,id',
            'name' => 'required|string|max:255',
            'role' => 'required|string',
            'origin' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->all();
        
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('team_members', 'public');
        }

        TeamMember::create($data);

        return response()->json(['message' => 'Team Member added successfully!']);
    }

    public function edit($id)
    {
        $member = TeamMember::findOrFail($id);
        return response()->json($member);
    }

    public function update(Request $request, $id)
    {
        $member = TeamMember::findOrFail($id);

        $request->validate([
            'team_id' => 'required|exists:teams,id',
            'name' => 'required|string|max:255',
            'role' => 'required|string',
            'origin' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($member->image) {
                Storage::disk('public')->delete($member->image);
            }
            $data['image'] = $request->file('image')->store('team_members', 'public');
        }

        $member->update($data);

        return response()->json(['message' => 'Team Member updated successfully!']);
    }

    public function destroy($id)
    {
        $member = TeamMember::findOrFail($id);
        if ($member->image) {
            Storage::disk('public')->delete($member->image);
        }
        $member->delete();
        return response()->json(['message' => 'Team Member deleted successfully!']);
    }

    public function toggleStatus($id)
    {
        $member = TeamMember::findOrFail($id);
        $member->status = !$member->status;
        $member->save();
        return response()->json(['message' => 'Status updated!']);
    }
}
