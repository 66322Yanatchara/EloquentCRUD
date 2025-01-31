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
        Schema::create('customers', function (Blueprint $table) {
            $table->id('CustomerID'); // สร้างคอลัมน์ 'id' เป็น Primary Key (Auto Increment)
            $table->string('CustomerName', 100);
            $table->string('Phone', 15);
            $table->string('Email', 100)->unique();
            $table->text('Address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};