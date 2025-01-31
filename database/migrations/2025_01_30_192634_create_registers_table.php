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
        Schema::create('registers', function (Blueprint $table) {
            $table->id('RegisterID'); // Primary Key
            $table->unsignedBigInteger('StudentID'); // Foreign Key
            $table->unsignedBigInteger('CourseID'); // Foreign Key
            $table->dateTime('RegisterDate'); // วันที่ลงทะเบียน
            $table->string('Grade', 2)->nullable(); // เกรดที่ได้รับ (nullable)

            // กำหนด Foreign Keys
            $table->foreign('StudentID')->references('StudentID')->on('students')->onDelete('cascade');
            $table->foreign('CourseID')->references('CourseID')->on('courses')->onDelete('cascade');

            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registers');
    }
};
