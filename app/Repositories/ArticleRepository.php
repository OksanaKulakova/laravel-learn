<?php

namespace App\Repositories;

use App\Models\Article;
use App\Contracts\ArticleRepositoryContract;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;

class ArticleRepository extends BaseRepository implements ArticleRepositoryContract
{
    public function __construct(Article $model)
    {
        parent::__construct($model);
    }

    public function findBySlug($slug): ?Model
    {
        return Cache::tags('articles')->remember(
            'article_slug_' . $slug,
            now()->addHour(),
            function () use ($slug) {
                return $this->model->where('slug', $slug)->first();
            }); 
    }

    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    public function update(array $attributes): void
    {
        $this->model->update($attributes);
    }

    public function delete(): void
    {
        $this->model->delete();  
    }

    public function new(): Model
    {
        return $this->model;
    }

    public function getPublishedArticles(int $page, int $perPage = 5): LengthAwarePaginator
    {
        return Cache::tags('articles')->remember(
            'articles_published_page_' . $page,
            now()->addHour(),
            function () use ($perPage, $page) {
                return $this->model->whereNotNull('published_at')->latest('published_at')->paginate($perPage, page: $page);
            }); 
    }

    public function getLatestPublishedArticles($count): Collection
    {
        return Cache::tags('articles')->remember(
            'articles_latest_' . $count,
            now()->addHour(),
            function () use ($count) {
                return $this->model->whereNotNull('published_at')->latest('published_at')->limit($count)->get();
            });
    }

    public function getCountArticles(): int
    {
        return $this->model->count();
    }

    public function getLongestArticle()
    {
        $article = $this->model->orderByRaw('CHAR_LENGTH(body) DESC')->first();

        return $article->title . ' id: ' . $article->id . ' длина: ' .  strlen($article->body);
    }

    public function getShortestArticle()
    {
        $article = $this->model->orderByRaw('CHAR_LENGTH(body)')->first();

        return $article->title . ' id: ' . $article->id . ' длина: ' .  strlen($article->body);
    }

    public function getMostTaggedArticle()
    {
        $article = $this->model->withCount('tags')->orderByDesc('tags_count')->first();

        return $article->title . ' id: ' . $article->id . ' количество тегов: ' .  $article->tags_count;
    }
}
