<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Banner;
use App\Models\Image;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banners = [
            'banners/test_banner_1.jpg',
            'banners/test_banner_2.jpg',
            'banners/test_banner_3.jpg',
        ];

        foreach($banners as $banner){
            Banner::factory()->for(Image::create(['image' => $banner]))->create(['link' => '/products/139']);
        }
    }
}
