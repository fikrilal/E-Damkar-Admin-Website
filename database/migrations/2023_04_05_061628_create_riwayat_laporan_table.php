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
        Schema::create('riwayat_laporan', function (Blueprint $table) {
            $table->string('id_lap');
            $table->date('tgl_lap');
            $table->integer('riwayat_kat_lap');
            $table->integer('riwayat_id_status');
            $table->integer('riwayat_idalamat');
            $table->integer('iduser');
            $table->string('deskripsi_laporan');
            $table->string('gambar_laporan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_laporan');
    }
};
