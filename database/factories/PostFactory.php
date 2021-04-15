<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'topic_id' => $this->faker->numberBetween(1, 4),
            'author_id' => $this->faker->numberBetween(1, 100),
            'title' => $this->faker->sentence(),
            'description' => $this->faker->sentences(4, true),
            'content' => $this->faker->paragraphs(50, true),
        ];
    }
}
