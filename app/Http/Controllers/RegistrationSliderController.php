<?php

namespace App\Http\Controllers;

use App\Models\RegistrationSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RegistrationSliderController extends Controller
{
    public function index()
    {
        $sliders = RegistrationSlider::orderBy('order', 'asc')->paginate(10);
        return view('backend.pages.registration_sliders.index', compact('sliders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
            'order' => 'nullable|integer',
            'status' => 'required|boolean',
        ]);

        $data = $request->only(['order', 'status']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('registration_sliders', 'public');
        }

        RegistrationSlider::create($data);

        return response()->json(['success' => true, 'message' => 'Slider added successfully!']);
    }

    public function edit(RegistrationSlider $slider)
    {
        return response()->json($slider);
    }

    public function update(Request $request, RegistrationSlider $slider)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'order' => 'nullable|integer',
            'status' => 'required|boolean',
        ]);

        $data = $request->only(['order', 'status']);

        if ($request->hasFile('image')) {
            if ($slider->image) {
                Storage::disk('public')->delete($slider->image);
            }
            $data['image'] = $request->file('image')->store('registration_sliders', 'public');
        }

        $slider->update($data);

        return response()->json(['success' => true, 'message' => 'Slider updated successfully!']);
    }

    public function destroy(RegistrationSlider $slider)
    {
        if ($slider->image) {
            Storage::disk('public')->delete($slider->image);
        }
        $slider->delete();
        return response()->json(['success' => true, 'message' => 'Slider deleted successfully!']);
    }

    public function toggleStatus(RegistrationSlider $slider)
    {
        $slider->status = !$slider->status;
        $slider->save();
        return response()->json(['success' => true, 'message' => 'Status updated!']);
    }
}
