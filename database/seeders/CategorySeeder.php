<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(5)
            ->create()
            ->each(function ($category) {
                $category->children()->saveMany(Category::factory(rand(1, 5))->make([
                    'parent_id' => $category->id
                ]));
            });
    }
}
