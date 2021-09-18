<?php

namespace Database\Factories;

use App\Models\Banner;
use App\Models\Car;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class BannerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Banner::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->realText(10),
            'description' => $this->faker->realTextBetween(10, 20),
        ];
    }
}
