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
        Schema::create('artikel_edukasis', function (Blueprint $table) {
            $table->id('id_edukasi');
            $table->foreignId('admin_damkar_id');
            $table->foreignId('kategori_artikel_id');
            $table->foreignId('foto_edukasi_id');
            $table->String('judul_edukasi');
            $table->String('dekspripsi_edukasi');
            $table->date('tgl_edukasi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artikel_edukasis');
    }
};
 