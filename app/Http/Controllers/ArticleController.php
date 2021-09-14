<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Article;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\TagRequest;
use App\Services\TagsSynchronizer;

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

    public function create(Article $article)
    {
        return view('pages.articles.create', compact('article'));
    }

    public function store(ArticleRequest $request, TagRequest $tagRequest, TagsSynchronizer $tagsSynchronizer)
    {
        $validated = $request->validated();

        $article = Article::create($validated);

        $tags = $tagRequest->getTagsCollection();
        
        $tagsSynchronizer->sync($tags, $article);

        return redirect()->route('articles.index');
    }

    public function edit(Article $article)
    {
        return view('pages.articles.edit', compact('article'));
    }

    public function update(Article $article, ArticleRequest $request, TagRequest $tagRequest, TagsSynchronizer $tagsSynchronizer)
    {
        $tags = $tagRequest->getTagsCollection();
        
        $tagsSynchronizer->sync($tags, $article);

        $validated = $request->validated();

        $article->update($validated);

        return redirect()->route('articles.index');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index');
    }
}
