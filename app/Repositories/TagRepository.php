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
}
