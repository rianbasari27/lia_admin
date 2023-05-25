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
        Schema::create('pembelian_detail', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pembelian');
            $table->string('nama_barang');
            $table->integer('jumlah');
            $table->string('satuan');
            $table->integer('biaya');
            $table->timestamps();

            $table->foreign('kode_pembelian')->references('kode_pembelian')->on('pembelian_header')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelian_detail');
    }
};
