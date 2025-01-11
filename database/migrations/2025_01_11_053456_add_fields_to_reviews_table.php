<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->float('comfort')->nullable()->after('rating');
            $table->float('staff')->nullable()->after('comfort');
            $table->float('facilities')->nullable()->after('staff');
            $table->float('value')->nullable()->after('facilities');
            $table->string('property_photos')->nullable()->after('review_text');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropColumn('comfort');
            $table->dropColumn('staff');
            $table->dropColumn('facilities');
            $table->dropColumn('value');
            $table->dropColumn('property_photos');
        });
    }
};
