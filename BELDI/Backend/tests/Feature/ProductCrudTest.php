<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Category;

class ProductCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_product()
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $category = Category::factory()->create(
            ['type' => 'product']
        );

        $response = $this->actingAs($admin, 'sanctum')
            ->postJson('/api/products', [
                'category_id' => $category->id,
                'title' => 'Test Product',
                'description' => 'This is a test product.',
                'price' => 100,
                'stock' => 5,
            ]);

        $response->assertStatus(201);
    }
}

