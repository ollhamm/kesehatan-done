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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('umur');
            $table->string('jenis_kelamin');
            $table->string('alamat');
            $table->string('rm')->unique();
            $table->string('rujukan');
            $table->string('jenis_asuransi');
            $table->integer('nomor_asuransi');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
