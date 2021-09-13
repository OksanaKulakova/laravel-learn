<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function index()
    {
        $products = Car::get();

        return view('pages.products.index', compact('products'));
    }

    public function show($id)
    {
        $car = Car::find($id);
        
        return view('pages.products.show', ['product' => $car]);
    }

}
