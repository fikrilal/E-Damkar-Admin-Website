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
        Schema::create('detail_laporans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('laporan_id'); 
            $table->String('nama_penyelamatan');
            $table->String('nama_hewan');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_laporans');
    }
};
