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
        Schema::create('reparasi_header', function (Blueprint $table) {
            $table->string('kode_reparasi')->primary();
            $table->unsignedBigInteger('nama_customer_id');
            $table->date('tanggal');
            $table->integer('total');
            $table->string('status_pembayaran');
            $table->timestamps();

            $table->foreign('nama_customer_id')->references('id')->on('customer')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reparasi');
    }
};
