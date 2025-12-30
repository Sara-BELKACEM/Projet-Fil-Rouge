<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    public function definition()
    {
        return [
            'category_id'=>Category::where('type','service')->inRandomOrder()->first()->id,
            'title'=>fake()->sentence(3),
            'description'=>fake()->paragraph(),
            'image'=>null
        ];
    }
}
