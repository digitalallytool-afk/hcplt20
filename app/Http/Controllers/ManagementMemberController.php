<?php

namespace App\Http\Controllers;

use App\Models\ManagementMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ManagementMemberController extends Controller
{
    public function index()
    {
        $members = ManagementMember::orderBy('order', 'asc')->paginate(10);
        return view('backend.pages.management.index', compact('members'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'order' => 'nullable|integer',
            'status' => 'required|boolean',
        ]);

        $data = $request->only(['name', 'designation', 'order', 'status']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('management', 'public');
        }

        ManagementMember::create($data);

        return response()->json(['success' => true, 'message' => 'Member added successfully!']);
    }

    public function edit(ManagementMember $member)
    {
        return response()->json($member);
    }

    public function update(Request $request, ManagementMember $member)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'order' => 'nullable|integer',
            'status' => 'required|boolean',
        ]);

        $data = $request->only(['name', 'designation', 'order', 'status']);

        if ($request->hasFile('image')) {
            if ($member->image) {
                Storage::disk('public')->delete($member->image);
            }
            $data['image'] = $request->file('image')->store('management', 'public');
        }

        $member->update($data);

        return response()->json(['success' => true, 'message' => 'Member updated successfully!']);
    }

    public function destroy(ManagementMember $member)
    {
        if ($member->image) {
            Storage::disk('public')->delete($member->image);
        }
        $member->delete();
        return response()->json(['success' => true, 'message' => 'Member deleted successfully!']);
    }

    public function toggleStatus(ManagementMember $member)
    {
        $member->status = !$member->status;
        $member->save();
        return response()->json(['success' => true, 'message' => 'Status updated!']);
    }
}
