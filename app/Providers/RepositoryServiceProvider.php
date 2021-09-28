<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Contracts\ArticleRepositoryContract;
use App\Contracts\CarRepositoryContract;
use App\Contracts\TagRepositoryContract;
use App\Contracts\CategoryRepositoryContract;
use App\Contracts\ImageRepositoryContract;
use App\Contracts\BannerRepositoryContract;
use App\Contracts\SalonRepositoryContract;
use App\Repositories\ArticleRepository;
use App\Repositories\CarRepository;
use App\Repositories\TagRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ImageRepository;
use App\Repositories\BannerRepository;
use App\Repositories\SalonRepository;

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
        $this->app->bind(CategoryRepositoryContract::class, CategoryRepository::class);
        $this->app->bind(ImageRepositoryContract::class, ImageRepository::class);
        $this->app->bind(BannerRepositoryContract::class, BannerRepository::class);
        $this->app->bind(SalonRepositoryContract::class, SalonRepository::class);
    }

    public function boot()
    {
        View::composer('layouts.app', function ($view) {
            $categoryRepository = $this->app->make(CategoryRepositoryContract::class);
            $categories = $categoryRepository->getCategories();

            $view->with([
                'categories' => $categories,
            ]);
        });

        View::composer('layouts.parts.footer', function ($view) {
            $salonRepository = $this->app->make(SalonRepositoryContract::class);
            $salons = $salonRepository->getRandomSalons();

            $view->with([
                'salons' => $salons,
            ]);
        });
    }

}
