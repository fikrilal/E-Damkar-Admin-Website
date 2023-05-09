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
        Schema::create('admin_damkars', function (Blueprint $table) {
            $table->id();
            $table->String('nama_lengkap');
            $table->String('email');
            $table->String('password');
            $table->String('noHp');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_damkars');
    }
};
