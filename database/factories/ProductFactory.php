<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => fake()->countryCode(),
            'designation' => fake()->word(),
            'price' => fake()->numberBetween(1000, 5000),
            'reduction' => fake()->numberBetween(1, 25),
        ];
    }
}