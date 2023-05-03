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
            'name' => fake()->word(),
            'description' => fake()->sentence(),
            // 'initial_stock' => fake()->numberBetween(1000, 2000),
            // 'remaining_stock' => fake()->numberBetween(100, 250),
            'reduction' => fake()->numberBetween(1, 25),
            'preparation' => fake()->paragraph(),
            'utilisation' => fake()->paragraph(5),
        ];
    }
}