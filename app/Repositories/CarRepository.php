<?php

namespace App\Repositories;

use App\Models\Car;
use App\Contracts\CarRepositoryContract;
use Illuminate\Pagination\LengthAwarePaginator;

class CarRepository extends BaseRepository implements CarRepositoryContract
{
    public function __construct(Car $model)
    {
        parent::__construct($model);
    }

    public function all(): LengthAwarePaginator
    {
        return $this->model->latest()->paginate(16);    
    }
}
