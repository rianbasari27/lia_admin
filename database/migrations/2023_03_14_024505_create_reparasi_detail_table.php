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
        Schema::create('reparasi_detail', function (Blueprint $table) {
            $table->id();
            $table->string('kode_reparasi');
            $table->unsignedBigInteger('nama_barang_id');
            $table->text('kerusakan');
            $table->integer('jumlah');
            $table->integer('biaya');
            $table->timestamps();

            // $table->foreign('kode_reparasi')->references('kode_reparasi')->on('reparasi_header')->onDelete('cascade');
            $table->foreign('nama_barang_id')->references('id')->on('jenis_barang')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reparasi_detail');
    }
};
