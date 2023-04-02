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

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response = $this->get('/articles');

        $response->assertStatus(200);
        $response->assertSee(__('Data does not exist!'));
    }

    public function test_articles_page_contains_data()
    {
        Article::factory()->create();

        $response = $this->get('/articles');

        $response->assertDontSee(__('Data does not exist!'));
    }

    public function test_add_new_article_working_successfully()
    {
        $user = User::factory()->create();
        $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);
        $this->get('/articles/create');
        $response = $this->post('articles/create', [
            'title' => 'qwer',
            'body' => 'qwer',
            'comments' => 'qwer',
            'slug' => 'qwer',
        ]);

        $response->assertSee('qwer');
    }

    public function test_articles_updated_successfully()
    {
        $user = User::factory()->create();
        $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);
        Article::factory()->create();

        $this->get('/articles/create');
        $response = $this->post('articles/create', [
            'title' => 'qwer',
            'body' => 'qwer',
            'comments' => 'qwer',
            'slug' => 'qwer',
        ]);

        $response->assertSee('qwer');
    }
}
