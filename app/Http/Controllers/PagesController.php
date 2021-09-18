<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\ArticleRepositoryContract;
use App\Contracts\CarRepositoryContract;
use App\Contracts\BannerRepositoryContract;

class PagesController extends Controller
{
    public function index(ArticleRepositoryContract $articleRepository, CarRepositoryContract $carRepository, BannerRepositoryContract $bannerRepository)
    {
        $articles = $articleRepository->getLatestPublishedArticles(3);
        $products = $carRepository->getNewCars(4);
        $banners = $bannerRepository->getBanners();

        return view('pages/homepage', compact('articles', 'products', 'banners'));
    }

    public function about()
    {
        return view('pages/about');
    }

    public function contacts()
    {
        return view('pages/contacts');
    }

    public function sales()
    {
        return view('pages/sales');
    }

    public function financial()
    {
        return view('pages/financial');
    }

    public function clients()
    {
        return view('pages/clients');
    }
}
