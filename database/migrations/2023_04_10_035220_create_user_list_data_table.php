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
            $table->String('email', 30)->unique();
            $table->String('password', 30);
            $table->String('namaLengkap',50);
            $table->String('noHp', 13);
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
