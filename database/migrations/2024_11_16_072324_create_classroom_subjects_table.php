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
        Schema::create('classroom_subjects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('classroom_id')->nullable(false);
            $table->foreign('classroom_id')->references('id')->on('classrooms')->onDelete('cascade');
            $table->unsignedBigInteger('subject_id')->nullable(false);
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->unsignedBigInteger('teacher_id')->nullable(false);
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classroom_subjects');
    }
};
