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

    public function findCategoryIdBySlug($slug): int
    {
        return $this->model->where('slug', $slug)->first()->id;
    }

    public function getCategoryAndChildren($category_id): Collection
    {
        return $this->model->descendantsAndSelf($category_id);
    }

    public function findCategoryBySlug($slug): Model
    {
        return $this->model->where('slug', $slug)->first();
    }
}
