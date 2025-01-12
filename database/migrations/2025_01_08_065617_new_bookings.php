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
            $table->string('booking_id')->unique();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // References `id` in `users` table
            $table->foreignId('room_id')->constrained('rooms')->onDelete('cascade'); // References `id` in `rooms` table
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->integer('guest_count');
            $table->string('booking_status')->default('pending');
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
