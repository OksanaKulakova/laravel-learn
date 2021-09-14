<?php

namespace App\Repositories;

use App\Models\Tag;
use App\Contracts\TagRepositoryContract;
use Illuminate\Support\Collection;

class TagRepository extends BaseRepository implements TagRepositoryContract
{
    public function __construct(Tag $model)
    {
        parent::__construct($model);
    }

}
