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
        Schema::create('konseling', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('layanan_id'); // Assuming `user_id` in `gurubk` is an unsigned big integer
            $table->unsignedBigInteger('guru_id');
            $table->unsignedBigInteger('murid_id');
            $table->unsignedBigInteger('walas_id'); 
            $table->string('tema');
            $table->string('keluhan');
            $table->string('tanggal_konseling');
            $table->string('tempat');
            $table->string('hasil_konseling');

            $table->foreign('guru_id')->references('user_id')->on('gurubk')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('layanan_id')->references('id')->on('layanans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('murid_id')->references('user_id')->on('murids')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('walas_id')->references('user_id')->on('walas')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konseling');
    }
};
