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
            $table->String('judul_edukasi');
            $table->text('deskripsi');
            $table->date('tgl_edukasi');
            $table->String('foto_artikel_edukasi');
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
 