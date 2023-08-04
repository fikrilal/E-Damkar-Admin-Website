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
        Schema::create('detail_laporan_penggunas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->text('deskripsi_laporan');
            $table->string('nama_hewan')->nullable();
            $table->time('waktu_pelaporan');
            $table->string('tgl_pelaporan');
            $table->string('urgensi');
            $table->string('alamat');
            $table->double('latitude');
            $table->double('longitude');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_laporan_penggunas');
    }
};
