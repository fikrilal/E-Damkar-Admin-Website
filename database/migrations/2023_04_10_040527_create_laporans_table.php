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
        Schema::create('laporans', function (Blueprint $table) {
            $table->id("idLaporan");
            $table->foreignId('user_listdata_id');
            $table->foreignId('status_riwayat_id');
            $table->foreignId('kategori_laporan_id');
            $table->date("tgl_lap");
            $table->text('deskripsi_laporan');
            $table->String('gambar_bukti_pelaporan');
            $table->String('alamat_kejadian');
            $table->string("latitude");
            $table->string("longitude");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    // public function down(): void
    // {
    //     Schema::dropIfExists('laporans');
    // }
};
