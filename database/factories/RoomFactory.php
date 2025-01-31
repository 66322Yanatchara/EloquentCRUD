<?php

namespace Database\Factories;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Room::class;

    public function definition()
    {
        return [
            'RoomNumber' => $this->faker->unique()->numerify('Room ###'),
            'RoomTypeID' => RoomType::factory(), // จะสร้าง RoomType ใหม่ให้โดยอัตโนมัติ
            'Status' => $this->faker->randomElement(['Available', 'Booked']),
        ];
    }
}