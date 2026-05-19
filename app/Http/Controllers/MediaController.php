<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function index()
    {
        $media = Media::orderBy('order', 'asc')->orderBy('created_at', 'desc')->paginate(12);
        return view('backend.pages.media.index', compact('media'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:image,video',
            'title' => 'nullable|string|max:255',
            'file' => 'nullable|required_if:type,image|image|mimes:jpeg,png,jpg,webp|max:5120',
            'video_url' => 'nullable|required_if:type,video|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->only(['type', 'title', 'video_url', 'order']);
        
        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('media/images', 'public');
        }

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('media/thumbnails', 'public');
        }

        Media::create($data);

        return response()->json(['message' => 'Media added successfully!']);
    }

    public function edit($id)
    {
        $media = Media::findOrFail($id);
        return response()->json($media);
    }

    public function update(Request $request, $id)
    {
        $media = Media::findOrFail($id);

        $request->validate([
            'type' => 'required|in:image,video',
            'title' => 'nullable|string|max:255',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'video_url' => 'nullable|required_if:type,video|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->only(['type', 'title', 'video_url', 'order']);

        if ($request->hasFile('file')) {
            if ($media->file_path) {
                Storage::disk('public')->delete($media->file_path);
            }
            $data['file_path'] = $request->file('file')->store('media/images', 'public');
        }

        if ($request->hasFile('thumbnail')) {
            if ($media->thumbnail) {
                Storage::disk('public')->delete($media->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store('media/thumbnails', 'public');
        }

        $media->update($data);

        return response()->json(['message' => 'Media updated successfully!']);
    }

    public function destroy($id)
    {
        $media = Media::findOrFail($id);
        if ($media->file_path) {
            Storage::disk('public')->delete($media->file_path);
        }
        if ($media->thumbnail) {
            Storage::disk('public')->delete($media->thumbnail);
        }
        $media->delete();
        return response()->json(['message' => 'Media deleted successfully!']);
    }

    public function toggleStatus($id)
    {
        $media = Media::findOrFail($id);
        $media->status = !$media->status;
        $media->save();
        return response()->json(['message' => 'Status updated!']);
    }
}
