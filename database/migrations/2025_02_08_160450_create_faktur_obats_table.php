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
        Schema::create('faktur_obat', function (Blueprint $table) {
            $table->id();
            $table->string('no_faktur');
            $table->string('kode_obat');

            $table->foreign('no_faktur')->references('no_faktur')->on('faktur')->onDelete('cascade');
            $table->foreign('kode_obat')->references('kode_obat')->on('obat')->onDelete('cascade');

            $table->integer('jumlah'); // Jumlah obat yang dibeli
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faktur_obat');
    }
};
