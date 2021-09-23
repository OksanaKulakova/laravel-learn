<?php

namespace App\Contracts;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

interface BannerRepositoryContract extends BaseRepositoryContract
{
    public function getBanners(): Collection;
}
