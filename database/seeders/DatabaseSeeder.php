<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'login' => 'kiko',
            'email' => 'qwdjo@qwd.ru',
            'password' => '12345678',
        ]);

        $services = [
            [
                'name' => 'огнезащита',
                'short_description' => 'укпупк',
                'price' => 10000,
                'img' => '/images/banners/card_vertical_1.jpeg',
                'icon' => '/images/icons/services/fire.png'
            ],
            [
                'name' => 'пескоструй',
                'short_description' => 'умукм',
                'price' => 10000,
                'img' => '/images/banners/card_vertical_1.jpeg',
                'icon' => '/images/icons/services/sand.png'
            ],
            [
                'name' => 'огнезащита',
                'short_description' => 'укпупк',
                'price' => 10000,
                'img' => '/images/banners/card_vertical_1.jpeg',
                'icon' => '/images/icons/services/fire.png'
            ],
            [
                'name' => 'пескоструй',
                'short_description' => 'умукм',
                'price' => 10000,
                'img' => '/images/banners/card_vertical_1.jpeg',
                'icon' => '/images/icons/services/sand.png'
            ],
            [
                'name' => 'огнезащита',
                'short_description' => 'укпупк',
                'price' => 10000,
                'img' => '/images/banners/card_vertical_1.jpeg',
                'icon' => '/images/icons/services/fire.png'
            ],
            [
                'name' => 'пескоструй',
                'short_description' => 'умукм',
                'price' => 10000,
                'img' => '/images/banners/card_vertical_1.jpeg',
                'icon' => '/images/icons/services/sand.png'
            ]
        ];

        
        foreach($services as $item){
            Service::create($item);
        }
    }
}
