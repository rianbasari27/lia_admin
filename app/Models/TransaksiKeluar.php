<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiKeluar extends Model
{
    use HasFactory;
    protected $table = "transaksi_keluar";
    protected $fillable = [
        'kode_transaksi',
        'kode_pembelian',
        'pembayaran_lain',
        'tanggal',
        'tujuan_transaksi',
        'nominal',
        'keterangan',
    ];

    public function pembelian_header() {
        return $this->hasMany(PembelianHeader::class, 'kode_pembelian');
    }

}
