<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CarClass;

class CarClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attributes = [
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'SUV1', 'SUV2', 'MPV'
        ];

        $rand = rand(4, count($attributes));
        for ($i = 0; $i < $rand; $i++) {
            CarClass::factory()->create(['name' => $attributes[$i]]);
        }
    }
}
