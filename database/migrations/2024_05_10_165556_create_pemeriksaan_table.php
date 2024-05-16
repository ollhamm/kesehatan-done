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
        Schema::create('pemeriksaan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pasien');
            $table->string('amnesia_dokter');
            $table->date('tanggal');
            $table->string('unit');
            $table->string('verifikator');
            $table->string('rujukan_dari');
            $table->text('rincian_tindakan');
            $table->string('jenis_pembayaran');
            $table->timestamps();

            // Definisi foreign key untuk relasi dengan tabel pasien
            $table->foreign('id_pasien')->references('id_pasien')->on('patients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeriksaan');
    }
};
