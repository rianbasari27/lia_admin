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
            $table->unsignedBigInteger('nama_sparepart_id');
            $table->integer('jumlah');
            $table->string('satuan');
            $table->integer('biaya');
            $table->integer('total');
            $table->timestamps();

            // $table->foreign('pembelian_header_id')->references('id')->on('pembelian_header')->onDelete('cascade');
            $table->foreign('nama_sparepart_id')->references('id')->on('sparepart')->onDelete('cascade');
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
