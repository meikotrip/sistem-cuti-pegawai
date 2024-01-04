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
        Schema::create('leave_requests', function (Blueprint $table) {
            $table->id('idLR');
            $table->foreignId('idUser')->constrained('users','id')->onDelete('cascade');
            $table->foreignId('idDivisi')->constrained('divisions','id')->onDelete('cascade');
            $table->date('tanggalMulai'); // tanggal mulai cuti
            $table->date('tanggalAkhir'); // tanggal selesai cuti
            $table->text('alamat');
            $table->text('alasanCuti');
            $table->integer('duration')->nullable(); // Jumlah hari cuti
            $table->enum('isAcceptedKadepartemen', ['pending', 'accepted', 'rejected'])->default('pending');
            $table->enum('isAcceptedKahrd', ['pending', 'accepted', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_request');
    }
};
