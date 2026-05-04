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
        // FEATURED: Must be published AND featured
        $featuredNews = NewsArticle::where('is_published', true)
                                   ->where('is_featured', true)
                                   ->latest('published_at')
                                   ->take(3)->get();

        // GENERAL: Published, but NOT featured (avoids duplicates)
        $generalNews = NewsArticle::where('is_published', true)
                                  ->latest('published_at')
                                  ->paginate(6);

        // TRENDING: Most viewed published articles
        $trendingPosts = NewsArticle::where('is_published', true)
                                    ->orderBy('views', 'desc')
                                    ->take(5)->get();

        return view('news', compact('featuredNews', 'generalNews', 'trendingPosts'));
    }

    public function show(NewsArticle $news)
    {
        // Hide from public ONLY if it is saved as a draft (is_published = false)
        if (!$news->is_published) {
            abort(404);
        }

        $news->increment('views');

        return view('news-article', ['article' => $news]);
    }

    public function index(Request $request)
    {
        // 1. Grab the search term from the URL (if there is one)
        $search = $request->input('search');

        // 2. Fetch articles, applying a filter if a search term exists
        $articles = NewsArticle::when($search, function ($query, $search) {
            return $query->where('title', 'like', "%{$search}%")
                         ->orWhere('category', 'like', "%{$search}%")
                         ->orWhere('author', 'like', "%{$search}%");
        })
        ->latest()
        ->paginate(10)
        ->withQueryString(); // <-- IMPORTANT: This keeps the search term in the URL when you click to Page 2!

        return view('admin.news.index', compact('articles', 'search'));
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
            'is_featured' => 'boolean',
            'published_at' => 'nullable|date',
        ]);
    }
}
