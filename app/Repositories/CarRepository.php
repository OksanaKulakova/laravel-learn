<?php

namespace App\Repositories;

use App\Models\Car;
use App\Models\Category;
use App\Contracts\CarRepositoryContract;
use Illuminate\Support\Collection;

class CarRepository extends BaseRepository implements CarRepositoryContract
{
    public function __construct(Car $model)
    {
        parent::__construct($model);
    }

    public function all()
    {
        return $this->model->latest()->paginate(16);    
    }

    public function getByCategory($slug)
    {
        $category_id = Category::where('slug', $slug)->first()->id;

        $categories = Category::descendantsAndSelf($category_id);

        return $this->model->whereIn('category_id', $categories->pluck('id'))->latest()->paginate(16);
    }
}
