<?php

namespace App\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;

interface CarRepositoryContract extends BaseRepositoryContract
{
    public function all(): LengthAwarePaginator;
}
