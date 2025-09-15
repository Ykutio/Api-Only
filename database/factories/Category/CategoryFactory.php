<?php

namespace Database\Factories\Category;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->domainWord();

        return [
            'name'       => ucfirst($name),
            'status'     => fake()->randomElement(['active', 'inactive']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
