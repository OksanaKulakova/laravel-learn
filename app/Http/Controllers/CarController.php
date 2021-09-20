<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Contracts\CarRepositoryContract;

class CarController extends Controller
{
    private $carRepository;
  
    public function __construct(CarRepositoryContract $carRepository)
    {
        $this->carRepository = $carRepository;
    }

    public function index()
    {
        $products = $this->carRepository->all();

        return view('pages.products.index', compact('products'));
    }

    public function show($id)
    {
        $car = $this->carRepository->find($id);
        
        return view('pages.products.show', ['product' => $car]);
    }

    public function category($slug)
    {
        $products = $this->carRepository->getByCategory($slug);

        return view('pages.products.index', compact('products'));
    }

}
