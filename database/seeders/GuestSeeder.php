<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Guest;
class GuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Guest::factory(10)->create(); // สร้างข้อมูล 10 รายการ
    }
}