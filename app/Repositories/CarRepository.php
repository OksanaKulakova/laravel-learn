<?php

namespace App\Repositories;

use App\Models\Car;
use App\Contracts\CategoryRepositoryContract;
use App\Contracts\CarRepositoryContract;
use Illuminate\Pagination\LengthAwarePaginator;

class CarRepository extends BaseRepository implements CarRepositoryContract
{
    private $categoryRepository;

    public function __construct(Car $model, CategoryRepositoryContract $categoryRepository)
    {
        parent::__construct($model);
        $this->categoryRepository = $categoryRepository;
    }

    public function all(): LengthAwarePaginator
    {
        return $this->model->latest()->paginate(16);    
    }

    public function getByCategory($slug): LengthAwarePaginator
    {
        $category_id = $this->categoryRepository->findCategoryIdBySlug($slug);
        $categories = $this->categoryRepository->getCategoryAndChildren($category_id);

        return $this->model->whereIn('category_id', $categories->pluck('id'))->latest()->paginate(16);
    }
}
