<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface CategoryRepositoryContract extends BaseRepositoryContract
{
    public function getCategories(): Collection;
}
