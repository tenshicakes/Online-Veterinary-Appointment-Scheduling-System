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
        Schema::create('services', function (Blueprint $table) {
        $table->id(); 
        $table->string('service_name');
        $table->text('service_description')->nullable();
        $table->decimal('price', 8, 2); // Handles prices up to 999,999.99
        $table->boolean('is_active')->default(true); // Allows admin to hide services
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
