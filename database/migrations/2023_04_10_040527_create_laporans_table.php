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
            $table->foreignId('detail_korban_id');
          

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
