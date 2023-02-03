<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class GradeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $score = fake()->numberBetween(0, 100);
        return [
            'user_id' => User::all()->random()->id,
            'course_id' => Course::all()->random()->id,
            'score' => $score,
            'letter_grade' => $this->calculateLetterGrade($score)
        ];
    }
    private function calculateLetterGrade(int $score): string
    {
        return match (true) {
            $score >= 85 => 'A',
            $score >= 75 => 'B',
            $score >= 65 => 'C',
            $score >= 55 => 'D',
            $score >= 40 => 'E',
            $score >= 15 => 'F',
            default => 'U',
        };
    }
}
