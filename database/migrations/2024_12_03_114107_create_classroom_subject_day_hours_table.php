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
        Schema::create('classroom_subject_day_hours', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('classroom_subject_day_id')->nullable(false);
            $table->unsignedBigInteger('schedule_hour_id')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classroom_subject_day_hours');
    }
};
