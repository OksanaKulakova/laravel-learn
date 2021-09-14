<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
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

        $articles = Article::factory()->count(5)->create([
            'published_at'=> $faker->dateTimeThisMonth(),
        ]);
        $tags = Tag::factory(5)->create();

        foreach ($articles as $article) {
            $randTags = $tags->random(rand(2, 4));

            $randTags->each(function ($tag) use ($article) {
                $article->tags()->save($tag);
            });
        }
        
        \App\Models\Article::factory(5)->create();
    }
}
