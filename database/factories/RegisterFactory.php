<?php

namespace Database\Factories;
use App\Models\Register;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Register>
 */
class RegisterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Register::class;

    public function definition()
    {
        return [
            'StudentID' => Student::factory(),
            'CourseID' => Course::factory(),
            'RegisterDate' => $this->faker->dateTimeThisYear(),
            'Grade' => $this->faker->randomElement(['A', 'B', 'C', 'D', 'F']),
        ];
    }
}