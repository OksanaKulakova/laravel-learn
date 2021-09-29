<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Contracts\CarRepositoryContract;
use App\Events\CarsEvents;
use App\Http\Resources\CarCollection;
use App\Http\Requests\CarRequest;

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

    public function cars()
    {
        $cars = $this->carRepository->getCars();
        return new CarCollection($cars);
    }

    public function store(CarRequest $request)
    {
        $attributes = $request->validated();

        $car = $this->carRepository->create($attributes);

        return ['success'=> true, 'car_id' => $car->id];
    }

    public function update($id, CarRequest $request)
    {
        $attributes = $request->validated();

        $car = $this->carRepository->find($id);

        $car->update($attributes);

        return ['success'=> true, 'car_id' => $car->id];
    }

    public function destroy($id)
    {
        $car = $this->carRepository->find($id);

        $car->delete();

        return ['success'=> true, 'car_id' => $car->id];
    }

}
