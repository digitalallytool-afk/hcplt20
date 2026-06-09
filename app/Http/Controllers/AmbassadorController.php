<?php

namespace App\Http\Controllers;

use App\Models\Ambassador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AmbassadorController extends Controller
{
    public function index()
    {
        $ambassadors = Ambassador::orderBy('order', 'asc')->paginate(10);
        return view('backend.pages.ambassadors.index', compact('ambassadors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'description' => 'nullable|string',
            'badge_text' => 'nullable|string|max:255',
        ]);

        $data = $request->only(['name', 'designation', 'order', 'description', 'badge_text']);
        
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('ambassadors', 'public');
        }

        Ambassador::create($data);

        return response()->json(['message' => 'Ambassador added successfully!'], 200);
    }

    public function edit($id)
    {
        $ambassador = Ambassador::findOrFail($id);
        return response()->json($ambassador);
    }

    public function update(Request $request, $id)
    {
        $ambassador = Ambassador::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'description' => 'nullable|string',
            'badge_text' => 'nullable|string|max:255',
        ]);

        $data = $request->only(['name', 'designation', 'order', 'description', 'badge_text']);

        if ($request->hasFile('image')) {
            if ($ambassador->image) {
                Storage::disk('public')->delete($ambassador->image);
            }
            $data['image'] = $request->file('image')->store('ambassadors', 'public');
        }

        $ambassador->update($data);

        return response()->json(['message' => 'Ambassador updated successfully!'], 200);
    }

    public function destroy($id)
    {
        $ambassador = Ambassador::findOrFail($id);
        if ($ambassador->image) {
            Storage::disk('public')->delete($ambassador->image);
        }
        $ambassador->delete();
        return response()->json(['message' => 'Ambassador deleted successfully!'], 200);
    }

    public function toggleStatus($id)
    {
        $ambassador = Ambassador::findOrFail($id);
        $ambassador->status = !$ambassador->status;
        $ambassador->save();
        return response()->json(['message' => 'Status updated!'], 200);
    }
}
