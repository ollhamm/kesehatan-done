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
        Schema::table('patients', function (Blueprint $table) {
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable(); 
            $table->string('domisili')->nullable();
            $table->string('jenis_asuransi')->nullable();
            $table->string('nomor_asuransi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('patients', function (Blueprint $table) {
            //
        });
    }
};
