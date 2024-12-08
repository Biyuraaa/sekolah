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
        Schema::create('classroom_subject_days', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('classroom_subject_id')->nullable(false);
            $table->foreign('classroom_subject_id')->references('id')->on('classroom_subjects')->onDelete('cascade');
            $table->enum('day', [
                'monday',
                'tuesday',
                'wednesday',
                'thursday',
                'friday',
            ])->default('monday');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classroom_subject_days');
    }
};
