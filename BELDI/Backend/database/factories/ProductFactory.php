<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition()
    {
        return [
            // 'category_id' => Category::where('type','product')->inRandomOrder()->first()->id,
            'category_id' => Category::factory(),
            'title' => fake()->sentence(3),
            'description' => fake()->paragraph(),
            'price' => fake()->numberBetween(100, 5000),
            'stock' => fake()->numberBetween(1, 50),
            'image' => null,
        ];
    }
}
