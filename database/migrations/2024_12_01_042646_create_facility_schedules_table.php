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
        Schema::create('facility_schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('facility_id')->nullable(false)->comment('ID fasilitas');
            $table->unsignedBigInteger('user_id')->nullable(false)->comment(' ID pengguna yang melakukan peminjaman');
            $table->date('date')->nullable(false)->comment(' Tanggal peminjaman');
            $table->time('start')->nullable(false)->comment(' Waktu mulai peminjaman');
            $table->time('end')->nullable(false)->comment(' Waktu selesai peminjaman');
            $table->enum('status', [
                'pending',
                'approved',
                'rejected',
                'canceled',
                'completed'
            ])->default('pending')->comment('Status peminjaman');
            $table->text('purpose')->nullable(false)->comment('Tujuan peminjaman');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facility_schedules');
    }
};
