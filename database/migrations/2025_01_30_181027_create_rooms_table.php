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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id('RoomID'); // รหัสห้องพัก
            $table->string('RoomNumber', 10);
            $table->unsignedBigInteger('RoomTypeID'); // เชื่อมโยงกับ RoomTypes
            $table->string('Status', 20);
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('RoomTypeID')->references('RoomTypeID')->on('room_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};