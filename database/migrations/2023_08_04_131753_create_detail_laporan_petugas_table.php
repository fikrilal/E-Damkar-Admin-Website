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
        Schema::create('detail_laporan_petugas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('damkar_id');
            $table->string('waktu_berangkat', 10);
            $table->string('waktu_sampai', 10);
            $table->string('waktu_selesai', 10);
            $table->string('waktu_penanganan', 10);
            $table->string('tgl_laporan_petugas', 20);
            $table->text('deskripsi_petugas');
            $table->integer('korban_jiwa');
            $table->integer('korban_luka_ringan');
            $table->integer('korban_luka_berat');
            $table->string('kerugian');
            $table->string('luas_lahan');
            $table->string('tindakan');
            $table->string('pihak_yang_datang');
            $table->string('jenis_evakuasi');
            $table->string('team_evakuasi');
            $table->string('bukti_foto_laporan_petugas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_laporan_petugas');
    }
};
