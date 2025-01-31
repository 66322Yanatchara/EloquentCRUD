<?php

namespace Database\Factories;
use App\Models\Student;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Student::class;

    public function definition()
    {
        return [
            'StudentName' => $this->faker->name, // Random student name
            'Major' => $this->faker->word, // Random major (subject)
            'Email' => $this->faker->unique()->safeEmail, // Unique random email
            'Phone' => $this->faker->numerify('###-###-####'), // รูปแบบหมายเลขโทรศัพท์ที่ยาวขึ้น

        ];
    }
}
