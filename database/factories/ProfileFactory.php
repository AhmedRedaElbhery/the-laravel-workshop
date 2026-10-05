<?php

namespace Database\Factories;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->name(),
            'handle' => $this->faker->unique()->userName(),
            'bio' => $this->faker->sentence(3, true),
            'avatar_url' => $this->faker->imageUrl(90, 90, 'people'),
        ];
    }
}
