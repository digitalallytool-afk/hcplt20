<?php

namespace App\Http\Controllers;

use App\Models\Trial;
use Illuminate\Http\Request;

class TrialController extends Controller
{
    public function index()
    {
        $trials = Trial::orderBy('created_at', 'desc')->paginate(10);
        return view('backend.pages.trials.index', compact('trials'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'zone_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'venue' => 'nullable|string|max:255',
            'date_text' => 'nullable|string|max:255',
            'fee' => 'nullable|string|max:255',
            'status' => 'required|string|max:50',
            'registration_link' => 'nullable|url|max:255',
        ]);

        Trial::create($request->all());

        return response()->json(['success' => true, 'message' => 'Trial added successfully!']);
    }

    public function edit(Trial $trial)
    {
        return response()->json($trial);
    }

    public function update(Request $request, Trial $trial)
    {
        $request->validate([
            'zone_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'venue' => 'nullable|string|max:255',
            'date_text' => 'nullable|string|max:255',
            'fee' => 'nullable|string|max:255',
            'status' => 'required|string|max:50',
            'registration_link' => 'nullable|url|max:255',
        ]);

        $trial->update($request->all());

        return response()->json(['success' => true, 'message' => 'Trial updated successfully!']);
    }

    public function destroy(Trial $trial)
    {
        $trial->delete();
        return response()->json(['success' => true, 'message' => 'Trial deleted successfully!']);
    }

    public function toggleStatus(Trial $trial)
    {
        $trial->is_active = !$trial->is_active;
        $trial->save();

        return response()->json(['success' => true, 'message' => 'Status updated!', 'is_active' => $trial->is_active]);
    }
}
