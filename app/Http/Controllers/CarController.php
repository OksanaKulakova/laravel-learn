<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Contracts\CarRepositoryContract;
use App\Events\CarsEvents;

class CarController extends Controller
{
    private $carRepository;
    protected int $page;
  
    public function __construct(CarRepositoryContract $carRepository, Request $request)
    {
        $this->carRepository = $carRepository;
        $this->page = $request->page ? : 1;
    }

    public function index()
    {
        $products = $this->carRepository->all($this->page);

        return view('pages.products.index', compact('products'));
    }

    public function show($id)
    {
        $car = $this->carRepository->find($id);
        
        return view('pages.products.show', ['product' => $car]);
    }

    public function category($slug)
    {
        $products = $this->carRepository->getByCategory($slug, $this->page);

        return view('pages.products.index', compact('products'));
    }

}
