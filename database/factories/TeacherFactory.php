<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = fake()->randomElement(['Mr', 'Mrs', 'Miss', 'Ms', 'Dr']);

        return [
            'uuid' => fake()->uuid(),
            'department_id' => Department::all()->random()->id,
            'title' => $title,
            'firstname' => fake()->firstName(),
            'lastname' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'gender' => $this->getGenderBasedOnTitle($title),
        ];
    }

    private function getGenderBasedOnTitle(string $title): string
    {
        return match ($title) {
            'Mr' => 'M',
            'Mrs', 'Miss', 'Ms' => 'F',
            default => fake()->randomElement(['M', 'F'])
        };
    }
}
