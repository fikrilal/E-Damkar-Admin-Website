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
        Schema::create('user_listdata', function (Blueprint $table) {
            $table->integer('id');
            $table->string('email');
            $table->string('password');
            $table->string('namaLengkap');
            $table->string('gambar_profile_user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_listdata');
    }
};
