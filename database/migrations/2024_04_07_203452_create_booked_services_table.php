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
        Schema::create('booked_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->references('id')->on('bookings');
            $table->foreignId('agent_service_id')->references('id')->on('agent_services');
            $table->enum('status',['pending','attended','canceled'])->default('pending');
            $table->integer('created_by');
            $table->integer('attended_by');
            $table->integer('cancelled_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booked_services');
    }
};
