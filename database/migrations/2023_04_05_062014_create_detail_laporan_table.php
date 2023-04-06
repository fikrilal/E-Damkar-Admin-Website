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
        Schema::create('detail_laporan', function (Blueprint $table) {
            $table->integer('id_detailLap');
            $table->string('detail_idRiwayat');
            $table->integer('detail_idbencana');
            $table->integer('detail_idhewan');
            $table->integer('detail_namapenyelamatan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_laporan');
    }
};
