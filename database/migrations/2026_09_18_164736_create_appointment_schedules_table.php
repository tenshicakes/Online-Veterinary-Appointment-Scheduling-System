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
        Schema::create('appointment_schedules', function (Blueprint $table) {
            // Relational Foreign Keys
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        $table->foreignId('info_id')->constrained('info', 'info_id')->onDelete('cascade'); 
        $table->foreignId('service_id')->constrained('services')->onDelete('cascade');
        
        // Scheduling Data
        $table->date('appointment_date');
        $table->time('appointment_time'); // The specific time slot
        
        // Status tracking based on DFD flows
        $table->enum('status', ['Pending', 'Confirmed', 'Completed', 'Canceled', 'Rescheduled'])->default('Pending');
        
        // Optional notes (e.g., "Dog is aggressive") 
        $table->text('owner_notes')->nullable(); 
        
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointment_schedules');
    }
};
