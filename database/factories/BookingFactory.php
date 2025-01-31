<?php

namespace Database\Factories;
use App\Models\Booking;
use App\Models\Room;
use App\Models\Guest;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Booking::class;

    public function definition()
    {
        return [
            'RoomID' => Room::inRandomOrder()->first()->RoomID, // ใช้ RoomID แบบสุ่ม
            'GuestID' => Guest::inRandomOrder()->first()->GuestID, // ใช้ GuestID แบบสุ่ม
            'BookingDate' => $this->faker->dateTimeThisYear(),
            'CheckInDate' => $this->faker->dateTimeThisYear(),
            'CheckOutDate' => $this->faker->dateTimeThisYear(),
            'TotalAmount' => $this->faker->randomFloat(2, 100, 500), // จำนวนเงินสุ่ม
        ];
    }
}