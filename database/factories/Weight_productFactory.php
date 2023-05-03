<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Weight_product>
 */
class Weight_productFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'price' => fake()->numberBetween(1000, 5000),
            'initial_stock' => fake()->numberBetween(1000, 2000),
            'remaining_stock' => fake()->numberBetween(20, 90),
        ];
    }
}
