<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AddProductTest extends TestCase
{
    use RefreshDatabase;

    public function testAddProduct()
    {
        $category = Category::factory()->create();
        $product = Product::factory()->create();
        $product->categories()->attach($category);
        $this->assertDatabaseHas('products', [
            'name' => $product->name,
        ]);
    }
}
