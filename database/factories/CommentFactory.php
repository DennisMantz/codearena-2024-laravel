<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;

class CommentFactory extends Factory
{
    protected $model = \App\Models\Comment::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'body' => $this->faker->sentence(),
            'post_id' => Post::factory(), 
            'created_at' => now()->subDays(rand(1, 10)),
            'updated_at' => now()->subDays(rand(1, 10)),
        ];
    }
}
