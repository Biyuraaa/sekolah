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
        Schema::create('classroom_students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->nullable(false);
            $table->unsignedBigInteger('classroom_id')->nullable(false);
            $table->unique(['student_id', 'classroom_id']);
            // Status yang lebih deskriptif
            $table->enum('status', [
                'ongoing',
                'graduated',
                'not_graduated',
                'dropped_out',
                'inactive'
            ])->default('ongoing'); // Status default adalah 'sedang berjalan'            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classroom_students');
    }
};
