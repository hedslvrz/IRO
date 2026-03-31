<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\NewsArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class NewsArticleController extends Controller
{
    public function publicIndex()
    {
        $featuredNews = NewsArticle::where('is_published', true)->latest('published_at')->take(3)->get();
        $generalNews = NewsArticle::where('is_published', true)->latest('published_at')->skip(3)->take(4)->get();
        $trendingPosts = NewsArticle::where('is_published', true)->orderBy('views', 'desc')->take(4)->get();

        return view('news', compact('featuredNews', 'generalNews', 'trendingPosts'));
    }

    public function index()
    {
        // Fetch articles from newest to oldest, with pagination
        $articles = NewsArticle::latest()->paginate(10);
        return view('admin.news.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.news.form', ['article' => new NewsArticle()]);
    }

    // 2. Process the New Article
    public function store(Request $request)
    {
        $data = $this->validateArticle($request);
        $data['slug'] = Str::slug($data['title']) . '-' . uniqid(); // Ensure unique slug

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('news_images', 'public');
        }

        NewsArticle::create($data);

        return redirect()->route('admin.news.index')->with('success', 'News article created successfully!');
    }

    // 3. Show the Edit Form
    public function edit(NewsArticle $news)
    {
        return view('admin.news.form', ['article' => $news]);
    }

    // 4. Process the Updates
    public function update(Request $request, NewsArticle $news)
    {
        $data = $this->validateArticle($request);

        if ($request->hasFile('cover_image')) {
            // Delete old image if it exists
            if ($news->cover_image) {
                Storage::disk('public')->delete($news->cover_image);
            }
            $data['cover_image'] = $request->file('cover_image')->store('news_images', 'public');
        }

        $news->update($data);

        return redirect()->route('admin.news.index')->with('success', 'News article updated successfully!');
    }

    public function destroy(NewsArticle $news)
    {
        // Delete the image from storage if it exists
        if ($news->cover_image) {
            Storage::disk('public')->delete($news->cover_image);
        }

        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'News article deleted successfully!');
    }

    // Helper method for validation
    private function validateArticle(Request $request)
    {
        return $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'author' => 'nullable|string|max:255',
            'excerpt' => 'nullable|string|max:500',
            'lede' => 'nullable|string',
            'nut_graf' => 'nullable|string',
            'content' => 'nullable|string',
            'quote' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'image_caption' => 'nullable|string|max:255',
            'tags' => 'nullable|string|max:255',                   
            'is_published' => 'boolean',
            'published_at' => 'nullable|date',
        ]);
    }
}
