<?php

namespace Database\Factories;

use App\Models\post;
use App\Models\profile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<post>
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
        return [
            'profile_id' => profile::factory(),
            'parent_id' => null,
            'content' => $this->faker->realText(200),
        ];
    }


    public function reply(Post $parentPost)
    {
        return $this->state([
            'parent_id' => $parentPost->id,
            'content' => $this->faker->realText(200),
        ]);
    }
}
