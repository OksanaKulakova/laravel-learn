<?php

namespace App\Contracts;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

interface ImageRepositoryContract extends BaseRepositoryContract
{
   public function create(string $path): Model;
}