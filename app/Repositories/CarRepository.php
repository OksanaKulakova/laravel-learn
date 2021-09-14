<?php

namespace App\Repositories;

use App\Models\Car;
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
        return $this->model->paginate(16);    
    }
}
