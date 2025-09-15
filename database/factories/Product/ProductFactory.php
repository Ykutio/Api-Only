<?php

namespace Database\Factories\Product;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->word();

        $randomImages = [
            'https://m.media-amazon.com/images/I/41WpqIvJWRL._AC_UY436_QL65_.jpg',
            'https://m.media-amazon.com/images/I/61ghDjhS8vL._AC_UY436_QL65_.jpg',
            'https://m.media-amazon.com/images/I/61c1QC4lF-L._AC_UY436_QL65_.jpg',
            'https://m.media-amazon.com/images/I/710VzyXGVsL._AC_UY436_QL65_.jpg',
            'https://m.media-amazon.com/images/I/61EPT-oMLrL._AC_UY436_QL65_.jpg',
            'https://m.media-amazon.com/images/I/71r3ktfakgL._AC_UY436_QL65_.jpg',
            'https://m.media-amazon.com/images/I/61CqYq+xwNL._AC_UL640_QL65_.jpg',
            'https://m.media-amazon.com/images/I/71cVOgvystL._AC_UL640_QL65_.jpg',
            'https://m.media-amazon.com/images/I/71E+oh38ZqL._AC_UL640_QL65_.jpg',
            'https://m.media-amazon.com/images/I/61uSHBgUGhL._AC_UL640_QL65_.jpg',
            'https://m.media-amazon.com/images/I/71nDK2Q8HAL._AC_UL640_QL65_.jpg',
        ];

        return [
            'name'        => ucfirst($name),
            'description' => fake()->text(250),
            'img'         => $randomImages[rand(0, 10)],
            'price'       => fake()->numberBetween(10, 1000),
            'brand_id'    => fake()->numberBetween(1, 8),
            'category_id' => fake()->numberBetween(1, 5),
            'country_id'  => fake()->numberBetween(1, 3),
            'quantity'    => fake()->numberBetween(0, 100),
            'status'      => fake()->randomElement(['active', 'inactive']),
            'created_at'  => now(),
            'updated_at'  => now(),
        ];
    }
}
