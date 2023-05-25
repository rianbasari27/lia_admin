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
        Schema::create('pembelian_header', function (Blueprint $table) {
            $table->string('kode_pembelian')->primary();
            $table->unsignedBigInteger('nama_supplier_id');
            $table->date('tanggal');
            $table->integer('total');
            $table->timestamps();

            $table->foreign('nama_supplier_id')->references('id')->on('supplier')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelian_header');
    }
};
