<?php

namespace App\Contracts;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface CarRepositoryContract extends BaseRepositoryContract
{
    public function find($id): ?Model;

    public function all(int $page, int $perPage): LengthAwarePaginator;

    public function getByCategory($slug, int $page, int $perPage): LengthAwarePaginator;

    public function getNewCars($count): Collection;
}
