<?php

namespace App\Repositories;

use App\Models\Car;
use App\Contracts\CategoryRepositoryContract;
use App\Contracts\CarRepositoryContract;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;

class CarRepository extends BaseRepository implements CarRepositoryContract
{
    private $categoryRepository;

    public function __construct(Car $model, CategoryRepositoryContract $categoryRepository)
    {
        parent::__construct($model);
        $this->categoryRepository = $categoryRepository;
    }

    public function find($id): ?Model
    {
        return Cache::tags('cars')->remember(
            'car_' . $id,
            now()->addHour(),
            function () use ($id) {
                return $this->model->find($id);
            });
    }

    public function all(int $page, int $perPage = 16): LengthAwarePaginator
    {
        return Cache::tags('cars')->remember(
            'cars_page_' . $page,
            now()->addHour(),
            function () use ($perPage, $page) {
                return $this->model->latest()->paginate($perPage, page: $page);
            });  
    }

    public function getByCategory($slug, int $page, int $perPage = 16): LengthAwarePaginator
    {
        $category_id = $this->categoryRepository->findCategoryIdBySlug($slug);
        $categories = $this->categoryRepository->getCategoryAndChildren($category_id);

        return Cache::tags('cars')->remember(
            'cars_' . $categories . '_page_' . $page,
            now()->addHour(),
            function () use ($categories, $perPage, $page) {
                return $this->model->whereIn('category_id', $categories->pluck('id'))->latest()->paginate($perPage, page: $page);
            });
    }

    public function getNewCars($count): Collection
    {
        return Cache::tags('cars')->remember(
            'cars_new' . $count,
            now()->addHour(),
            function () use ($count) {
                return $this->model->whereNotNull('is_new')->latest()->limit($count)->get();
            });
    }
}
