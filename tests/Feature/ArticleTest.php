<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    use RefreshDatabase;

    public function test_article_page_does_not_contain_data()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/articles');

        $response->assertStatus(200);
        $response->assertSee(__('Data does not exist!'));
    }

    public function test_articles_page_contains_data()
    {
        $user = User::factory()->create();
        Article::factory()->create();

        $response = $this->actingAs($user)->get('/articles');

        $response->assertDontSee(__('Data does not exist!'));
    }

    public function test_add_new_article_working_successfully()
    {
        $user = User::factory()->create();
        $articles = Article::factory()->create();

        $response = $this->actingAs($user)->get('/articles');

        $response->assertStatus(200);
        $response->assertViewHas('articles', function ($collection) use ($articles) {
            return $collection->contains($articles);
        });
    }
}
