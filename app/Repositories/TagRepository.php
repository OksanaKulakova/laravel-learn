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
        $tags = $this->model->withCount('articles')->get();

        $tag = $tags->where('articles_count', $tags->max('articles_count'))->first()->name;

        return $tag;
    }

    public function getAvgCountArticle()
    {
        $tags = $this->model->withCount('articles')->get();
        $tags = $tags->where('articles_count', '>', 0);
        $avg = $tags->avg('articles_count');

        return $avg;
    }
}
