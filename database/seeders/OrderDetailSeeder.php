<?php

namespace Database\Seeders;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = Order::all();  // ดึงข้อมูล Order ที่มีอยู่ในฐานข้อมูล

        foreach ($orders as $order) {
            // สมมติว่า ProductID มี 10 รายการให้สุ่มเลือก
            for ($i = 0; $i < 3; $i++) {
                OrderDetail::create([
                    'OrderID' => $order->OrderID,
                    'ProductID' => Product::inRandomOrder()->first()->ProductID,
                    'Quantity' => rand(1, 10),
                    'UnitPrice' => rand(10, 500),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}