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
        Schema::create('student_scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exam_id')->constrained()->onDelete('cascade');
            $table->foreignId('classroom_student_id')->constrained('classroom_students')->onDelete('cascade');
            $table->unsignedBigInteger('classroom_subject_id')->nullable(false);
            $table->foreign('classroom_subject_id')->references('id')->on('classroom_subjects')->onDelete('cascade');
            $table->integer('score')->nullable(false)->default(0);
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_scores');
    }
};
