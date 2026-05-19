<?php

namespace App\Http\Controllers;

use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsCategoryController extends Controller
{
    public function index()
    {
        $categories = NewsCategory::orderBy('order', 'asc')->paginate(10);
        return view('backend.pages.news.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'order' => 'integer',
        ]);

        NewsCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'order' => $request->order ?? 0,
            'status' => 1
        ]);

        return response()->json(['message' => 'Category created!'], 200);
    }

    public function edit($id)
    {
        return response()->json(NewsCategory::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $category = NewsCategory::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'order' => 'integer',
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'order' => $request->order ?? 0
        ]);

        return response()->json(['message' => 'Category updated!'], 200);
    }

    public function destroy($id)
    {
        NewsCategory::findOrFail($id)->delete();
        return response()->json(['message' => 'Category deleted!'], 200);
    }

    public function toggleStatus($id)
    {
        $category = NewsCategory::findOrFail($id);
        $category->status = !$category->status;
        $category->save();
        return response()->json(['message' => 'Status updated!'], 200);
    }
}
