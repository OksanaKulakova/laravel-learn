<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Models\Article;
use App\Models\Image;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\TagRequest;
use App\Services\TagsSynchronizer;
use App\Services\ImagesSynchronizer;
use App\Contracts\ArticleRepositoryContract;
use App\Events\ArticlesEvents;

class ArticleController extends Controller
{
    private $articleRepository;
    protected int $page;
  
    public function __construct(ArticleRepositoryContract $articleRepository, Request $request)
    {
        $this->articleRepository = $articleRepository;
        $this->page = $request->page ? : 1;
    }

    public function index()
    {
        $articles = $this->articleRepository->getPublishedArticles($this->page);
        
        return view('pages.articles.index', compact('articles'));
    }

    public function show($slug)
    {
        $article = $this->articleRepository->findBySlug($slug);
        return view('pages.articles.show', compact('article'));
    }

    public function create(Request $request)
    {
        $article = $this->articleRepository->new();
        abort_if(auth()->user()->cannot('create', $article), 403);
        return view('pages.articles.create', compact('article'));
    }

    public function store(ArticleRequest $request, TagRequest $tagRequest, TagsSynchronizer $tagsSynchronizer, ImagesSynchronizer $imagesSynchronizer)
    {
        $attributes = $request->validated();

        $article = $this->articleRepository->create($attributes);

        $tags = $tagRequest->getTagsCollection();
        
        $tagsSynchronizer->sync($tags, $article);

        $imagesSynchronizer->sync($request->file('image'), $article);

        event(new ArticlesEvents($article));

        return redirect()->route('articles.index');
    }

    public function edit($slug)
    {
        $article = $this->articleRepository->findBySlug($slug);

        abort_if(auth()->user()->cannot('update', $article), 403);
        
        return view('pages.articles.edit', compact('article'));
    }

    public function update($slug, ArticleRequest $request, TagRequest $tagRequest, TagsSynchronizer $tagsSynchronizer, ImagesSynchronizer $imagesSynchronizer)
    {
        $tags = $tagRequest->getTagsCollection();

        $article = $this->articleRepository->findBySlug($slug);

        $tagsSynchronizer->sync($tags, $article);
        $imagesSynchronizer->sync($request->file('image'), $article);

        $attributes = $request->validated();  
        
        $article->update($attributes);

        event(new ArticlesEvents($article));

        return redirect()->route('articles.index');
    }

    public function destroy($slug)
    {
        $article = $this->articleRepository->findBySlug($slug);

        abort_if(auth()->user()->cannot('delete', $article), 403);

        $article->delete();

        event(new ArticlesEvents($article));

        return redirect()->route('articles.index');
    }
}
