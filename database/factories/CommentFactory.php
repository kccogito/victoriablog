<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Comment::class;

    public function definition()
    {
        return [
            //
            'subject' => $this->faker->words(10, true),
            'article_id' => $this->faker->randomNumber(1),
            'body' => $this->faker->sentence(5), //factory(App\User::class),

        ];
    }
}
