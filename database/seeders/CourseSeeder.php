<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Teacher;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ถ้ายังไม่มีอาจารย์ ให้สร้างขึ้นมา 5 คน
        if (Teacher::count() == 0) {
            Teacher::factory(5)->create();
        }

        // สร้าง Courses หลังจากที่มีอาจารย์แล้ว
        Course::factory(10)->create();
    }
}
