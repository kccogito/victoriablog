<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Tag::class;

    public function definition()
    {
        return [
            //
            'label' => $this->faker->words(1, true),
            'url' => $this->faker->url(),
            'article_id' => $this->faker->randomNumber(1),



        ];
    }
}
