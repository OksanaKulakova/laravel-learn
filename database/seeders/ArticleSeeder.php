<?php

namespace Database\Seeders;

use App\Models\Article;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        \App\Models\Article::factory()->count(5)->create([
            'published_at'=> $faker->dateTimeThisMonth(),
        ]);
        
        \App\Models\Article::factory(5)->create();
    }
}
