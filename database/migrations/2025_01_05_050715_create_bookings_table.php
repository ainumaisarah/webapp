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
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->string('booking_id')->unique();
            $table->string('cust_id'); // Foreign Key
            $table->string('room_id'); // Foreign Key
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->integer('guest_count');
            $table->string('booking_status');
            $table->timestamps(); // Adds created_at and updated_at columns

            // Foreign Key Constraints
            $table->foreign('cust_id')->references('cust_id')->on('customers')->onDelete('cascade');
            $table->foreign('room_id')->references('room_id')->on('rooms')->onDelete('cascade');
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
