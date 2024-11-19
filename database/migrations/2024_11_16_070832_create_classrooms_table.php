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
        Schema::create('classrooms', function (Blueprint $table) {
            $table->id();
            $table->enum('year_level', ['10', '11', '12']);
            $table->enum('group_numbers', ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10']);
            $table->string('batch_name');
            $table->string('academic_year');
            $table->unsignedBigInteger('teacher_id')->nullable(false);
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classrooms');
    }
};
