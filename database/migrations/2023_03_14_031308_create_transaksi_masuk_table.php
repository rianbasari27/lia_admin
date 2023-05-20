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
        Schema::create('transaksi_masuk', function (Blueprint $table) {
            $table->string('kode_transaksi')->primary();
            $table->unsignedBigInteger('nama_customer_id');
            $table->string('kode_reparasi');
            $table->date('tanggal');
            $table->string('tujuan_pembayaran');
            $table->integer('nominal');
            $table->string('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('nama_customer_id')->references('id')->on('customer')->onDelete('cascade');
            // $table->foreign('kode_reparasi')->references('kode_reparasi')->on('reparasi_header')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_masuk');
    }
};
