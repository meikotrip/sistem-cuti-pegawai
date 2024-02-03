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
        Schema::create('user_divisions', function (Blueprint $table) {
            $table->id('idUserDivision');
            $table->foreignId('idUser')->constrained('users','id')->onDelete('cascade');
            $table->foreignId('idDivisi')->constrained('divisions','id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_division');
    }
};
