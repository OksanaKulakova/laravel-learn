<?php

namespace App\Repositories;

use App\Models\Tag;
use App\Contracts\TagRepositoryContract;
use Illuminate\Database\Eloquent\Model;

class TagRepository extends BaseRepository implements TagRepositoryContract
{
    public function __construct(Tag $model)
    {
        parent::__construct($model);
    }

    public function firstOrCreate($array): ?Model
    {
        return $this->model->firstOrCreate($array);
    }

    public function tagHasMostArticles(): string
    {
        $tag = $this->model->withCount('articles')->orderByDesc('articles_count')->first();

        return $tag->name;
    }

    public function getAvgCountArticle()
    {
        $avg = $this->model->has('articles')->withCount('articles')->get()->avg('articles_count');

        return $avg;
    }
}
