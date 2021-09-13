<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CarBody;

class CarBodySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attributes = [
            'Седан', 'Хэтчбек', 'Универсал', 'Лифтбэк', 'Купе', 'Кабриолет', 'Родстер', 
            'Стретч', 'Тарга', 'Внедорожник', 'Кроссовер', 'Пикап', 'Фургон', 'Минивэн',
        ];

        $rand = rand(4, count($attributes));
        for ($i = 0; $i < $rand; $i++) {
            CarBody::factory()->create(['name' => $attributes[$i]]);
        }
    }
}
