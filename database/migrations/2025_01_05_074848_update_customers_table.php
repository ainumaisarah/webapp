<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            if (!Schema::hasColumn('customers', 'email_verified_at')) {
                $table->timestamp('email_verified_at')->nullable();
            }
            if (!Schema::hasColumn('customers', 'remember_token')) {
                $table->rememberToken();
            }
            if (Schema::hasColumn('customers', 'cust_pass')) {
                $table->string('cust_pass')->change(); // Ensure cust_pass is used for authentication
            }
            if (Schema::hasColumn('customers', 'cust_phone')) {
                $table->string('cust_phone')->change(); // Change cust_phone to string
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            if (Schema::hasColumn('customers', 'email_verified_at')) {
                $table->dropColumn('email_verified_at');
            }
            if (Schema::hasColumn('customers', 'remember_token')) {
                $table->dropColumn('remember_token');
            }
            // Revert cust_pass and cust_phone changes if necessary
        });
    }
}
