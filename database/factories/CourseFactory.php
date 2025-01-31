<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        return [
            'CourseName' => $this->faker->word,
            'Credits' => $this->faker->numberBetween(3, 6),
            'TeacherID' => Teacher::inRandomOrder()->first()->TeacherID ?? Teacher::factory(),
        ];
    }
}
