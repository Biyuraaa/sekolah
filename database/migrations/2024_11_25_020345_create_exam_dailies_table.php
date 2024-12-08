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
        Schema::create('exam_dailies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('classroom_subject_id'); // Relasi ke classroom_subjects
            $table->foreign('classroom_subject_id')->references('id')->on('classroom_subjects')->onDelete('cascade');
            $table->date('date');
            $table->time('start_time');
            $table->string('end_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_dailies');
    }
};
