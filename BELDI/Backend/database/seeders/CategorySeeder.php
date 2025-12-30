<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            ['name' => 'Interior Design', 'type' => 'service'],
            ['name' => 'Exterior Design', 'type' => 'service'],
            ['name' => 'Architectural Design', 'type' => 'service'],

            ['name' => 'Lighting', 'type' => 'product'],
            ['name' => 'Tiles', 'type' => 'product'],
            ['name' => 'Furniture', 'type' => 'product'],
            ['name' => 'Rugs & Textiles', 'type' => 'product'],
            ['name' => 'Accessories & Art', 'type' => 'product'],
        ]);
    }
}
