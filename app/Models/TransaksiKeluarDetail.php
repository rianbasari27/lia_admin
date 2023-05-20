<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiKeluarDetail extends Model
{
    use HasFactory;
    protected $table = "transaksi_keluar_detail";
    protected $fillable = [
        'kode_transaksi',
        'tujuan_transaksi',
        'nominal',
        'keterangan',
    ];

    public function transaksi_keluar_header() {
        return $this->belongsTo(TransaksiKeluarHeader::class, 'kode_transaksi');
    }
}
