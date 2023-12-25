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
        //
        Schema::table('seats', function (Blueprint $table) {
            // First, remove the paribahan_name column
            $table->dropColumn('paribahan_name');

            // Then, add it back in the desired position
            $table->string('bus_name')->nullable()->after('trip_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('seats', function (Blueprint $table) {
            // Reverse the changes
            $table->dropColumn('paribahan_name');
        });
    }
};
