<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;

interface TagRepositoryContract extends BaseRepositoryContract
{
    public function firstOrCreate($array): ?Model;
}
