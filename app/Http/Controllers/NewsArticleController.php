<?php

namespace App\Http\Controllers;

use App\Models\NewsArticle;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class NewsArticleController extends Controller
{
    public function index()
    {
        $articles = NewsArticle::with('category')->orderBy('order', 'asc')->paginate(10);
        $categories = NewsCategory::where('status', 1)->get();
        return view('backend.pages.news.articles.index', compact('articles', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:news_categories,id',
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $data = $request->only(['category_id', 'title', 'content', 'order']);
        $data['slug'] = Str::slug($request->title) . '-' . rand(100, 999);
        $data['published_at'] = now();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        NewsArticle::create($data);

        return response()->json(['message' => 'News article published!'], 200);
    }

    public function edit($id)
    {
        return response()->json(NewsArticle::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $article = NewsArticle::findOrFail($id);
        $request->validate([
            'category_id' => 'required|exists:news_categories,id',
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $data = $request->only(['category_id', 'title', 'content', 'order']);
        $data['slug'] = Str::slug($request->title) . '-' . rand(100, 999);

        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        $article->update($data);

        return response()->json(['message' => 'News article updated!'], 200);
    }

    public function destroy($id)
    {
        $article = NewsArticle::findOrFail($id);
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }
        $article->delete();
        return response()->json(['message' => 'News article deleted!'], 200);
    }

    public function toggleStatus($id)
    {
        $article = NewsArticle::findOrFail($id);
        $article->status = !$article->status;
        $article->save();
        return response()->json(['message' => 'Status updated!'], 200);
    }
}
