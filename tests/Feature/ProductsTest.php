<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductsTest extends TestCase
{
    use RefreshDatabase;

    public function test_paginated_articles_table_doesnt_contain_11th_record()
    {
        $user = User::factory()->create();

        for ($i = 1; $i <= 11; $i++) {
            $product = Product::create([
                'name' => 'Product ' . $i,
                'price' => rand(100, 999)
            ]);
        }
        $response = $this->actingAs($user)->get('products');

        $response->assertStatus(200);
        $response->assertViewHas('products', function ($collection) use ($product) {
            return !$collection->contains($product);
        });
    }
}
