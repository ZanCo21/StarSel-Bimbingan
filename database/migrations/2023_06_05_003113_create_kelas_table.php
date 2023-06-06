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
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gurubk_id'); // Assuming `user_id` in `gurubk` is an unsigned big integer
            $table->string('nama_kelas');
            $table->string('jurusan');
            $table->timestamps();
            $table->foreign('gurubk_id')->references('user_id')->on('gurubk')->onDelete('cascade')->onUpdate('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
