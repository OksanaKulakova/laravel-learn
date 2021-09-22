<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\ArticleRepositoryContract;
use App\Contracts\CarRepositoryContract;
use App\Contracts\BannerRepositoryContract;
use App\Models\Car;

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
        $products = Car::get();

        $averagePrice = $products->avg('price');

        $averageDiscountedPrice = $products->whereNotNull('old_price')->avg('price');

        $expensiveModel = $products->sortByDesc('price')->first();

        $salons = $products->map(function ($item) { return $item->salon;})->unique()->values();

        $engines = $products->map(function ($item) { return $item->carEngine->name;})->unique()->sort()->values();

        $classes = $products->pluck('carClass.name', 'carClass.name')->unique()->sort();

        $collect1 = $products->whereNotNull('old_price')
            ->filter(function ($item) {
                return stripos($item->name, 5) || stripos($item->name, 6) || stripos($item->carEngine->name, 5) || stripos($item->carEngine->name, 6) || stripos($item->kpp, 5) || stripos($item->kpp, 6);
            });

        $collect2 = $products->whereNull('old_price')
            ->map(function ($item) {
                return $item->carBody;
            })
            ->unique()
            ->map(function ($item) use ($products) {
                return [$item->name => $products->where('car_body_id', $item->id)->avg('price')];
            })
            ->collapse()
            ->sort();
        
        return view('pages/clients', compact('averagePrice', 'averageDiscountedPrice', 'expensiveModel', 'salons', 'engines', 'classes', 'collect1', 'collect2'));
    }
}
