<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kunjungan_labolaturium', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pemeriksaan');
            $table->date('tanggal_kunjungan');
            $table->date('tanggal_selesai');
            $table->timestamps();

            $table->foreign('id_pemeriksaan')->references('id_periksa')->on('pemeriksaan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kunjungan_labolaturium');
    }
};
