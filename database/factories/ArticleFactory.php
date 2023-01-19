<?php

namespace Database\Factories;

use App\Models\Article;
use Faker\Generator as Faker;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{

    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'title' => $this->faker->words(10, true),
            'short_description' => $this->faker->text, //factory(App\User::class),
            'slug' => $this->faker->slug,
            'image' => $this->faker->imageUrl(),
            'thumbnail' => $this->faker->imageUrl(),
            'likes' => $this->faker->randomNumber(1),
            'views' => $this->faker->randomNumber(1),
            'body' => $this->faker->sentence(45),
        ];
    }
}
