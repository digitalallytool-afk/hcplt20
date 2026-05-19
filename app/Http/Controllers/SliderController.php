<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('order', 'asc')->paginate(10);
        return view('backend.pages.settings.sliders', compact('sliders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'title' => 'nullable|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'link' => 'nullable|url|max:255',
            'status' => 'required|boolean',
        ]);

        $data = $request->only(['title', 'sub_title', 'link', 'status']);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/sliders'), $filename);
            $data['image'] = 'uploads/sliders/' . $filename;
        }

        Slider::create($data);

        return response()->json(['success' => true, 'message' => 'Slider added successfully!']);
    }

    public function edit(Slider $slider)
    {
        return response()->json($slider);
    }

    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'title' => 'nullable|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'link' => 'nullable|url|max:255',
            'status' => 'required|boolean',
        ]);

        $data = $request->only(['title', 'sub_title', 'link', 'status']);

        if ($request->hasFile('image')) {
            // Delete old image
            if (File::exists(public_path($slider->image))) {
                File::delete(public_path($slider->image));
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/sliders'), $filename);
            $data['image'] = 'uploads/sliders/' . $filename;
        }

        $slider->update($data);

        return response()->json(['success' => true, 'message' => 'Slider updated successfully!']);
    }

    public function destroy(Slider $slider)
    {
        if (File::exists(public_path($slider->image))) {
            File::delete(public_path($slider->image));
        }
        $slider->delete();

        return response()->json(['success' => true, 'message' => 'Slider deleted successfully!']);
    }

    public function toggleStatus(Slider $slider)
    {
        $slider->status = !$slider->status;
        $slider->save();

        return response()->json(['success' => true, 'message' => 'Status updated!', 'status' => $slider->status]);
    }
}
