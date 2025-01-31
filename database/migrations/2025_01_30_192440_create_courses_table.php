<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id('CourseID');
            $table->string('CourseName');
            $table->integer('Credits');
            $table->unsignedBigInteger('TeacherID'); // สร้างคอลัมน์ TeacherID ที่เป็น foreign key
            $table->foreign('TeacherID')->references('TeacherID')->on('teachers')->onDelete('cascade'); // สร้าง foreign key reference
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
