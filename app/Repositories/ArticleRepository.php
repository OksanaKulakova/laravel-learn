<?php

namespace App\Repositories;

use App\Models\Article;
use App\Contracts\ArticleRepositoryContract;
use Illuminate\Support\Collection;

class ArticleRepository extends BaseRepository implements ArticleRepositoryContract
{
    public function __construct(Article $model)
    {
        parent::__construct($model);
    }

    public function getPublishedArticles()
    {
        return $this->model->whereNotNull('published_at')->latest('published_at')->get();
    }
}
