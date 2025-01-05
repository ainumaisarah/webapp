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
            $table->id();
            $table->string('cust_id', 8)->unique();
            $table->string('cust_name');
            $table->string('cust_email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('cust_pass'); // Use cust_pass instead of password
            $table->rememberToken();
            $table->string('cust_phone')->unique(); // Change cust_phone to string
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
