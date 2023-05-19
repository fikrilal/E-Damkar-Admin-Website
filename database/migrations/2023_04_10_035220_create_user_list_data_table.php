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
        Schema::create('user_list_data', function (Blueprint $table) {
            $table->id();
            $table->String('username', 50)->unique();
            $table->String('password');
            $table->String('namaLengkap', 50);
            $table->String('noHp', 13);
            $table->String('kodeOtp');
            $table->String('status');
            $table->String('foto_user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_list_data');
    }
};
