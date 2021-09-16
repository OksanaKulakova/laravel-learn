<?php

namespace App\Repositories;

use App\Models\Category;
use App\Contracts\CategoryRepositoryContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class CategoryRepository extends BaseRepository implements CategoryRepositoryContract
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function getCategories(): Collection
    {
        return $this->model->withDepth()->having('depth', '<', 2)->get()->sortBy('sort')->toTree();
    }
}
