<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->words(2, true);
        $slug = Str::slug($title);

        return [
            'title' => $title,
            'user_id' => rand(1, 10),
            'body' => $this->faker->text(100),
            'slug' => $slug,
            'comments' => $this->faker->text(rand(5, 18)),
        ];
    }
}
