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
            $table->foreign('id_pasien')->references('id_pasien')->on('patients')->onDelete('cascade');
            $table->date('tanggal_pemeriksaan');
            $table->string('unit_pemeriksaan');
            $table->string('rujukan_pemeriksaan');
            $table->string('rincian_pemeriksaan');
            $table->string('jenis_pembayaran');
            $table->timestamps();
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
