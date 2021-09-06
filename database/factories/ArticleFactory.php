<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'slug' => $this->faker->slug(),
            'title' => $this->faker->realText(30),
            'description' => $this->faker->realTextBetween(50, 80),
            'body' => $this->faker->realTextBetween(150, 1000),
            'published_at' => $this->faker->optional(0.5)->dateTimeThisMonth(),
        ];
    }
}
