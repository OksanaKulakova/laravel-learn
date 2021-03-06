<?php

namespace App\Repositories;

use App\Models\Banner;
use App\Contracts\BannerRepositoryContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class BannerRepository extends BaseRepository implements BannerRepositoryContract
{
    public function __construct(Banner $model)
    {
        parent::__construct($model);
    }

    public function getBanners(): Collection
    {
        return Cache::tags('banners')->remember(
            'banners',
            now()->addHour(),
            function () {
                return $this->model->latest()->get();
            });  
    }
}
