<?php

namespace Database\Seeders;

use App\Models\Car;
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

        // Car::factory()->create([
        //     'make' => 'ford',
        //     'model' => 'mustang',
        //     'condition' => 'good',
        //     'transmission' => 'manual',
        //     'drive_type' => 'rwd',
        //     'year' => 1970,
        //     'mpg' => 25,
        //     'miles' => 95_000,
        //     'price' => 70_000,
        // ]);
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
        ]);
    }
}
