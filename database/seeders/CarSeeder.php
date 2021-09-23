<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;
use App\Models\CarBody;
use App\Models\CarClass;
use App\Models\CarEngine;
use App\Models\Category;
use App\Models\Image;

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
        $bodies = CarBody::get();
        $classes = CarClass::get();
        $engines = CarEngine::get();
        $categories = Category::whereNotNull('parent_id')->get();
        $images = Image::get();

        for ($i = 0; $i < $rand; $i++) {
            $car = Car::factory()->create([
                'car_class_id' => $classes->random()->id,
                'car_body_id' => $bodies->random()->id,
                'car_engine_id' => $engines->random()->id,
                'category_id' => $categories->random()->id,
                'image_id' => $images->random()->id,
            ]);

            $randImages = $images->random(rand(2, 4));
            $randImages->each(function ($image) use ($car) {
                $car->pictures()->save($image);
            });
        }
    }
}
