<?php

namespace App\Repositories;

use App\Models\Article;
use App\Contracts\ArticleRepositoryContract;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class ArticleRepository extends BaseRepository implements ArticleRepositoryContract
{
    public function __construct(Article $model)
    {
        parent::__construct($model);
    }

    public function findBySlug($slug): ?Model
    {
        return $this->model->where('slug', $slug)->first();
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

    public function getPublishedArticles(): LengthAwarePaginator
    {
        return $this->model->whereNotNull('published_at')->latest('published_at')->paginate(5);
    }

    public function getLatestPublishedArticles($count): Collection
    {
        return $this->model->whereNotNull('published_at')->latest('published_at')->limit($count)->get();
    }
}
