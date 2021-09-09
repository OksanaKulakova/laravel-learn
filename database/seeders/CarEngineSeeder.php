<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CarEngine;

class CarEngineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attributes = [
            'бензиновый',
            'дизельный',
            'газовый',
            'гибридный',
        ];

        $rand = rand(4, count($attributes));
        for ($i = 0; $i < $rand; $i++) {
            CarEngine::factory()->create(['name' => $attributes[$i]]);
        }
    }
}
