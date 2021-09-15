<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;
use App\Models\CarBody;
use App\Models\CarClass;
use App\Models\CarEngine;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rand = rand(20, 50);
        $bodies = CarBody::query()->get();
        $classes = CarClass::query()->get();
        $engines = CarEngine::query()->get();
        $categories = Category::whereNotNull('parent_id')->get();

        for ($i = 0; $i < $rand; $i++) {
            $car = Car::factory()->create([
                'car_class_id' => $classes->random()->id,
                'car_body_id' => $bodies->random()->id,
                'car_engine_id' => $engines->random()->id,
                'category_id' => $categories->random()->id,
            ]);
        }
    }
}
