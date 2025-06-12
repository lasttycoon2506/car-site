<?php

namespace Database\Seeders;

use App\Models\Car;
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
        // Car::factory(10)->create();
        // php artisan migrate:refresh --seed

        User::factory()->create(["name" => "test user", "email" => "test@test.com"]);

        Car::factory()->create([
            'make' => 'ford',
            'model' => 'mustang',
            'condition' => 'good',
            'transmission' => 'manual',
            'drive_type' => 'rwd',
            'year' => 1970,
            'mpg' => 25,
            'miles' => 95_000,
            'price' => 70_000,
            "pictures" => ["https://res.cloudinary.com/dojufv7og/image/upload/w_1000,ar_16:9,c_fill,g_auto,e_sharpen/v1749487804/1970-ford-mustang-convertible_obw4ex.jpg", "https://res.cloudinary.com/dojufv7og/image/upload/w_1000,ar_16:9,c_fill,g_auto,e_sharpen/v1749499565/il_1588xN.4420850968_3jff_x9p36q.jpg", "https://res.cloudinary.com/dojufv7og/image/upload/w_1000,ar_16:9,c_fill,g_auto,e_sharpen/v1749499605/1970-ford-mustang-fastback_somhlf.webp"],
            "user_id" => 1
        ]);
        Car::factory()->create([
            'make' => 'honda',
            'model' => 'civic',
            'condition' => 'great',
            'transmission' => 'automatic',
            'drive_type' => 'fwd',
            'year' => 1990,
            'mpg' => 30,
            'miles' => 60_000,
            'price' => 20_000,
            "pictures" => ["https://res.cloudinary.com/dojufv7og/image/upload/w_1000,ar_16:9,c_fill,g_auto,e_sharpen/v1749487943/rGNdQkgK-EAA62-ga9w-_edit_jz2kla.jpg"],
            "user_id" => 1
        ]);
        Car::factory()->create([
            'make' => 'chevrolet',
            'model' => 'camaro',
            'condition' => 'average',
            'transmission' => 'manual',
            'drive_type' => 'awd',
            'year' => 1975,
            'mpg' => 28,
            'miles' => 106_000,
            'price' => 60_000,
            "pictures" => ["https://res.cloudinary.com/dojufv7og/image/upload/w_1000,ar_16:9,c_fill,g_auto,e_sharpen/v1749487997/1975-chevrolet-camaro-lt_sdvk1c.webp"],
            "user_id" => 1
        ]);
        Car::factory()->create([
            'make' => 'toyota',
            'model' => 'tacoma',
            'condition' => 'excellent',
            'transmission' => 'automatic',
            'drive_type' => 'awd',
            'year' => 2005,
            'mpg' => 18,
            'miles' => 80_000,
            'price' => 26_000,
            "pictures" => ["https://res.cloudinary.com/dojufv7og/image/upload/w_1000,ar_16:9,c_fill,g_auto,e_sharpen/v1749488141/2005-tacoma-double-cab10-1616785708.jpg_luvcmq.jpg"],
            "user_id" => 1
        ]);
        Car::factory()->create([
            'make' => 'volvo',
            'model' => 's5',
            'condition' => 'good',
            'transmission' => 'automatic',
            'drive_type' => 'fwd',
            'year' => 2008,
            'mpg' => 32,
            'miles' => 80_000,
            'price' => 36_000,
            "pictures" => ["https://res.cloudinary.com/dojufv7og/image/upload/w_1000,ar_16:9,c_fill,g_auto,e_sharpen/v1749488196/3oRQGxmE-XcuGaiTJUO-_edit_zv1rzq.jpg"],
            "user_id" => 1
        ]);
        Car::factory()->create([
            'make' => 'bmw',
            'model' => 'm3',
            'condition' => 'average',
            'transmission' => 'manual',
            'drive_type' => 'awd',
            'year' => 2010,
            'mpg' => 35,
            'miles' => 130_000,
            'price' => 40_000,
            "pictures" => ["https://res.cloudinary.com/dojufv7og/image/upload/w_1000,ar_16:9,c_fill,g_auto,e_sharpen/v1749488244/2010-bmw-m3-gts-photo-307829-s-original_ltpf4h.jpg"],
            "user_id" => 1
        ]);
        Car::factory()->create([
            'make' => 'pontiac',
            'model' => 'firebird',
            'condition' => 'excellent',
            'transmission' => 'manual',
            'drive_type' => 'rwd',
            'year' => 1965,
            'mpg' => 22,
            'miles' => 145_000,
            'price' => 22_000,
            "pictures" => ["https://res.cloudinary.com/dojufv7og/image/upload/w_1000,ar_16:9,c_fill,g_auto,e_sharpen/v1749488314/481673577_606455312236342_5365813689313123102_n.jpg_unum6a.jpg"],
            "user_id" => 1
        ]);
        Car::factory()->create([
            'make' => 'ford',
            'model' => 'bronco',
            'condition' => 'great',
            'transmission' => 'manual',
            'drive_type' => 'awd',
            'year' => 2015,
            'mpg' => 28,
            'miles' => 50_000,
            'price' => 27_000,
            "pictures" => ["https://res.cloudinary.com/dojufv7og/image/upload/w_1000,ar_16:9,c_fill,g_auto,e_sharpen/v1749488359/960px-Ford_Bronco__286th_generation_29_Outer_Banks_1X7A0384_t5wlxg.jpg"],
            "user_id" => 1
        ]);
        Car::factory()->create([
            'make' => 'infiniti',
            'model' => 'g3',
            'condition' => 'average',
            'transmission' => 'automatic',
            'drive_type' => 'fwd',
            'year' => 2013,
            'mpg' => 31,
            'miles' => 120_000,
            'price' => 43_000,
            "pictures" => ["https://res.cloudinary.com/dojufv7og/image/upload/w_1000,ar_16:9,c_fill,g_auto,e_sharpen/v1749488424/2013-infiniti-g-sedan-02-1557854532.jpg_cspddu.jpg"],
            "user_id" => 1
        ]);
        Car::factory()->create([
            'make' => 'audi',
            'model' => 'a7',
            'condition' => 'average',
            'transmission' => 'automatic',
            'drive_type' => 'rwd',
            'year' => 2010,
            'mpg' => 35,
            'miles' => 75_000,
            'price' => 40_000,
            "pictures" => ["https://res.cloudinary.com/dojufv7og/image/upload/w_1000,ar_16:9,c_fill,g_auto,e_sharpen/v1749488537/2010-audi-a5-sportback-review-car-and-driver-photo-291459-s-original_wzixed.jpg"],
            "user_id" => 1
        ]);
    }
}
