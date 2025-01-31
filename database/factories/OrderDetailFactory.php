<?php

namespace Database\Factories;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderDetail>
 */
class OrderDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
    // ตรวจสอบว่า Order มีอยู่ในฐานข้อมูล
    $order = Order::inRandomOrder()->first();
    if (!$order) {
        throw new \Exception("No orders found in the database.");
    }

    $product = Product::inRandomOrder()->first();

    return [
        'OrderID' => $order->id,  // ใช้ id ของ Order ที่สุ่มได้
        'ProductID' => $product->ProductID,
        'Quantity' => $this->faker->numberBetween(1, 10),
        'UnitPrice' => $this->faker->randomFloat(2, 20, 500),
    ];
    }
}