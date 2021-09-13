<?php

namespace Database\Factories;

use App\Models\CarEngine;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarEngineFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CarEngine::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(30)
        ];
    }
}
