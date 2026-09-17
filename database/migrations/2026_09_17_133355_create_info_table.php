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
        Schema::create('info', function (Blueprint $table) {
            $table->id('info_id');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('contact_number');
            $table->string('pet_name');
            $table->string('pet_species');
            $table->string('pet_breed')->nullable();
            $table->string('pet_image_path')->nullable();
            $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('info');
    }
};
