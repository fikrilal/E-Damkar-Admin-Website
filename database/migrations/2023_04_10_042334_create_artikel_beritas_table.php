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
        Schema::create('artikel_beritas', function (Blueprint $table) {
            $table->id('id_berita');
            $table->foreignId('admin_damkar_id');
            $table->foreignId('kategori_artikel_id');
            $table->foreignId('foto_berita_id');
            $table->String('judul_berita');
            $table->String('dekspripsi_berita');
            $table->date('tgl_berita');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artikel_beritas');
    }
};
