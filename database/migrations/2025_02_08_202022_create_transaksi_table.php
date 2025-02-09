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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->string('no_transaksi');
            $table->string('kode_obat');
            $table->integer('qty');
            $table->decimal('selisih', 15, 2);
            $table->decimal('nilai_buku', 15, 2);
            $table->decimal('nilai_fisik', 15, 2);
            $table->decimal('selisih_nilai', 15, 2);
            $table->primary(['no_transaksi', 'kode_obat']);
            $table->foreign('kode_obat')->references('kode')->on('obat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
