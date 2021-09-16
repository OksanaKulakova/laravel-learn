<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\ArticleRepositoryContract;
use App\Contracts\CarRepositoryContract;
use App\Contracts\TagRepositoryContract;
use App\Repositories\ArticleRepository;
use App\Repositories\CarRepository;
use App\Repositories\TagRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ArticleRepositoryContract::class, ArticleRepository::class);
        $this->app->bind(CarRepositoryContract::class, CarRepository::class);
        $this->app->bind(TagRepositoryContract::class, TagRepository::class);
    }

}
