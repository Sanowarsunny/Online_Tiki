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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->string('from');
            $table->string('to');
            $table->string('paribahan_name');
            $table->integer('total_seats');
            $table->date('journey_date');
            $table->integer('ticket_price');
            
            // Time columns in 12-hour format without seconds
            $table->time('departure_time')->format('h:i A');
            $table->time('arrival_time')->format('h:i A');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
