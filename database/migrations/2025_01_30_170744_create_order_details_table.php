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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id('OrderDetailID');  // Primary Key ของ OrderDetail
            $table->unsignedBigInteger('OrderID');  // ใช้ OrderID เป็น Foreign Key
            $table->unsignedBigInteger('ProductID');  // ใช้ ProductID เป็น Foreign Key
            $table->integer('Quantity');
            $table->decimal('UnitPrice', 10, 2);
            $table->timestamps();

            $table->foreign('OrderID')->references('OrderID')->on('orders')->onDelete('cascade');
            $table->foreign('ProductID')->references('ProductID')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};