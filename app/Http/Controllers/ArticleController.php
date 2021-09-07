<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::whereNotNull('published_at')->latest()->get();

        return view('pages.articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('pages.articles.show', compact('article'));
    }

    public function create()
    {
        return view('pages.articles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:5|max:100|unique:articles',
            'description' => 'required|max:255',
            'body' => 'required',
        ]);

        Article::create([
            'slug' => Str::slug($request->title, "-"),
            'title' => $request->title,
            'description' => $request->description,
            'body' => $request->body,
            'published_at' => $request->has('published_at') ? Carbon::now() : null,
        ]);

        return redirect()->route('articles.index');
    }
}
