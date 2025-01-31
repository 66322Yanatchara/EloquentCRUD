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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id('BookingID'); // Primary Key
            $table->unsignedBigInteger('RoomID'); // Foreign Key
            $table->unsignedBigInteger('GuestID'); // Foreign Key
            $table->dateTime('BookingDate'); // วันที่จอง
            $table->dateTime('CheckInDate'); // วันที่เข้าพัก
            $table->dateTime('CheckOutDate'); // วันที่ออกจากที่พัก
            $table->decimal('TotalAmount', 10, 2); // ยอดรวมค่าจอง

            // กำหนด Foreign Keys
            $table->foreign('RoomID')->references('RoomID')->on('rooms')->onDelete('cascade');
            $table->foreign('GuestID')->references('GuestID')->on('guests')->onDelete('cascade'); // แก้เป็น 'guests'

            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};