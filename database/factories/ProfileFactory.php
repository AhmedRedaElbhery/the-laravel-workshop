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
        $handle = $this->faker->unique()->userName();
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->name(),
            'handle' =>  $handle,
            'bio' => $this->faker->sentence(3, true),
            'avatar_url' => 'http://i.pravatar.cc/90?u=' . $handle,
            'cover_url' => 'http://dummyimage.com/1400x640/555/ECA749?text=' . $handle,
        ];
    }
}
