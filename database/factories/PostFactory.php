<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $is_draft = $this->faker->boolean(50);

        return [
            'title'        => $this->faker->sentence,
            'body'         => $this->faker->paragraph,
            'is_draft'     => $is_draft,
            'published_at' => $is_draft ? $this->faker->date() : null,
        ];
    }
}
