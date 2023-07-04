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
        Schema::create('artikel_agendas', function (Blueprint $table) {
            $table->id('id_agenda');
            $table->foreignId('admin_damkar_id');
            $table->String('judul_agenda');
            $table->date('tgl_agenda');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artikel_agendas');
    }
};
