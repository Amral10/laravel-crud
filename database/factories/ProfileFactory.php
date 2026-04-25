<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
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
        $username = $this->faker->unique()->sentence();

        return [
            'username' => $username,
            'bio' => $this->faker->text,
            'nascimento' => $this->faker->date,
            'foto' => $this->faker->imageUrl(400, 400),

            'user_id' => User::pluck('id')->random(),
            
        ];
    }
}