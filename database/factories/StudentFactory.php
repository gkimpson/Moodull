<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $firstname = fake()->firstName();
        $lastname = fake()->lastName();
        return [
            'uuid' => fake()->uuid(),
            'nickname' => fake()->name(),
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => strtolower($firstname . '.' . $lastname . '@moodull.com'),
            'email_verified_at' => now(),
            'gender' => fake()->randomElement(['M', 'F']),
            'is_active' => fake()->randomElement([0, 1]),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
