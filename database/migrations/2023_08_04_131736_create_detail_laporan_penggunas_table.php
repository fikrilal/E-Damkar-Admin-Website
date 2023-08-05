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
            $table->foreignId('user_listdata_id');
            $table->text('deskripsi_laporan');
            $table->string('nama_hewan')->nullable();
            $table->string('waktu_pelaporan');
            $table->date('tgl_pelaporan');
            $table->string('urgensi');
            $table->string('alamat');
            $table->double('latitude');
            $table->double('longitude');
            $table->string('bukti_foto_laporan_pengguna');
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
