<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Article;
use App\Http\Requests\ArticleRequest;

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

    public function store(ArticleRequest $request)
    {
        $validated = $request->validated();

        Article::create($validated);

        return redirect()->route('articles.index');
    }
}
