<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tabel Users
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
        });

        // Tabel Fields (Lapangan)
        Schema::create('fields', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type'); // Rumput Sintetis / Matras / Vinyl
            $table->integer('price_per_hour');
            $table->enum('status', ['available', 'maintenance'])->default('available');
        });

        // Tabel Bookings (Reservasi) dengan Foreign Key
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('field_id')->constrained('fields')->onDelete('cascade');
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->date('booking_date');
            $table->time('start_time');
            $table->integer('duration');
            $table->integer('total_price');
            $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
        Schema::dropIfExists('fields');
        Schema::dropIfExists('users');
    }
};