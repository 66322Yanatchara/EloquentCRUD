<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition()
    {
        // สุ่ม CustomerID จากลูกค้าที่มีอยู่ หรือใช้ 1 เป็นค่าเริ่มต้นหากไม่มี
        return [
            'OrderDate' => $this->faker->dateTimeThisCentury(),
            'CustomerID' => Customer::inRandomOrder()->first()->CustomerID ?? 1,  // ใช้ 1 เป็นค่าเริ่มต้นถ้าไม่ได้ข้อมูลลูกค้า
            'TotalAmount' => $this->faker->randomFloat(2, 20, 500),
        ];
    }

    /**
     * สร้างสถานะที่บ่งบอกว่าออเดอร์นี้เป็นออเดอร์ที่ไม่ได้รับการชำระ
     */
    public function unpaid(): static
    {
        return $this->state(fn (array $attributes) => [
            'TotalAmount' => 0, // กำหนดยอดรวมเป็น 0 เพื่อบ่งบอกว่าเป็นออเดอร์ที่ไม่ได้ชำระ
        ]);
    }
}
