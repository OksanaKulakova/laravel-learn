<?php

namespace App\Contracts;

use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface CarRepositoryContract extends BaseRepositoryContract
{
    public function all(): LengthAwarePaginator;

    public function getByCategory($slug): LengthAwarePaginator;

    public function getNewCars($count): Collection;
}
