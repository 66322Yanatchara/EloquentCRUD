<?php

namespace Database\Factories;
use App\Models\Guest;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guest>
 */
class GuestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Guest::class;

    public function definition()
    {
        return [
            'GuestName' => $this->faker->name,
            'Phone' => $this->faker->unique()->phoneNumber, // ฟังก์ชัน faker จะสร้างเบอร์โทรศัพท์ที่มีเครื่องหมาย
            'Email' => $this->faker->unique()->safeEmail,
            'Address' => $this->faker->address,
        ];
    }
}