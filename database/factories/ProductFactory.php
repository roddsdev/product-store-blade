<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'dsProduct' => fake()->text(),
            'price' => fake()->numberBetween(500, 10000),
            'color' => fake()->hexColor(),
            'weight' => fake()->numberBetween(1, 1000)
        ];
    }
}
