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

class ArticleController extends Controller
{
    private $articleRepository;
  
    public function __construct(ArticleRepositoryContract $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function index()
    {
        $articles = $this->articleRepository->getPublishedArticles();
        
        return view('pages.articles.index', compact('articles'));
    }

    public function show($slug)
    {
        $article = $this->articleRepository->findBySlug($slug);
        return view('pages.articles.show', compact('article'));
    }

    public function create()
    {
        $article = $this->articleRepository->new();
        return view('pages.articles.create', compact('article'));
    }

    public function store(ArticleRequest $request, TagRequest $tagRequest, TagsSynchronizer $tagsSynchronizer, ImagesSynchronizer $imagesSynchronizer)
    {
        $attributes = $request->validated();

        $article = $this->articleRepository->create($attributes);

        $tags = $tagRequest->getTagsCollection();
        
        $tagsSynchronizer->sync($tags, $article);

        $imagesSynchronizer->sync($request->file('image'), $article);

        return redirect()->route('articles.index');
    }

    public function edit($slug)
    {
        $article = $this->articleRepository->findBySlug($slug);
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

        return redirect()->route('articles.index');
    }

    public function destroy($slug)
    {
        $article = $this->articleRepository->findBySlug($slug);
        $article->delete();

        return redirect()->route('articles.index');
    }
}
