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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name',90);
            $table->string('middle_name',90)->nullable();
            $table->string('last_name',90);
            $table->enum('sex',['female','male']);
            $table->date('dob')->nullable();
            $table->string('role',60);
            $table->string('email')->unique();
            $table->string('phone_number',16)->unique();
            $table->string('password');
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
