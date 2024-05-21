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
        Schema::table('patients', function (Blueprint $table) {
            $table->unsignedBigInteger('callcenter_id')->nullable();
            $table->foreign('callcenter_id')->references('id')->on('callcenters')->onDelete('cascade');
        });
    }


    public function down(): void
    {
        Schema::table('patients', function (Blueprint $table) {
            //
        });
    }
};
