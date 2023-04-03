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
        $products = Product::factory(11)->create();
        $lastProduct = $products->last();
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('products');

        $response->assertStatus(200);
        $response->assertViewHas('products', function ($collection) use ($lastProduct) {
            return !$collection->contains($lastProduct);
        });
    }
}
