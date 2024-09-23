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
        Schema::create('blood_sugar_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id'); // Ensure this is unsignedBigInteger
            $table->float('level');
            $table->date('log_date');
            // $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->timestamps();

    // Define the foreign key properly
        $table->foreign('patient_id')
          ->references('id')
          ->on('patients')
          ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blood_sugar_logs');
    }
};
