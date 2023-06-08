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
        Schema::create('peta_kerawanan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('walas_id');
            $table->unsignedBigInteger('murid_id');
            $table->unsignedBigInteger('kerawanan_id');
            $table->text('kesimpulan')->nullable();
            $table->timestamps();
            $table->foreign('walas_id')->references('user_id')->on('walas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('kerawanan_id')->references('id')->on('jenis_kerawanan')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('murid_id')->references('user_id')->on('murids')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peta_kerawanan');
    }
};
