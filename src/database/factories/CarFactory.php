<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "make" => fake()->name(),
            "model" => fake()->name(),
            "condition" => "good",
            "transmission" => "automatic",
            "drive_type" => "front-wheel drive",
            "year" => fake()->numberBetween(1900, 2025),
            "mpg" => fake()->numberBetween(5, 75),
            "miles" => fake()->numberBetween(1, 200_000),
            "price" => fake()->numberBetween(5_000, 300_000),
            "pictures" => "https://res.cloudinary.com/dojufv7og/image/upload/w_1000,ar_1:1,c_fill,g_auto,e_art:hokusai/v1737481409/zk5yvhuwwlpqruoiqayw.jpg"
        ];
    }
}
