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
        Schema::create('orders', function (Blueprint $table) {
            $table->id('OrderID');  // ใช้ OrderID เป็น Primary Key
            $table->unsignedBigInteger('CustomerID');  // เปลี่ยนจาก id เป็น CustomerID
            $table->dateTime('OrderDate');
            $table->decimal('TotalAmount', 10, 2);
            $table->timestamps();

            $table->foreign('CustomerID')->references('CustomerID')->on('customers')->onDelete('cascade');  // สร้าง Foreign Key
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};