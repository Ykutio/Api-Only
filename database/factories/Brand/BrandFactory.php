<?php

namespace Database\Factories\Brand;

use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'       => fake()->company,
            'country_id' => fake()->numberBetween(1, 3),
            'status'     => fake()->randomElement(['active', 'inactive']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
