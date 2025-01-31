<?php

namespace Database\Factories;
use App\Models\Teacher;
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
    protected $model = Teacher::class;

    public function definition()
    {
        return [
            'TeacherName' => $this->faker->name,
            'Department' => $this->faker->word,
            'Email' => $this->faker->unique()->safeEmail,
        ];
    }
}