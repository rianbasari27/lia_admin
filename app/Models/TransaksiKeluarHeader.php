<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiKeluarHeader extends Model
{
    use HasFactory;
    protected $table = "transaksi_keluar_header";
    protected $fillable = [
        'kode_transaksi',
        'tanggal',
        'transaksi_tujuan',
        'total',
    ];

    public function transaksi_keluar_detail() {
        return $this->hasMany(TransaksiKeluarDetail::class, 'kode_transaksi');
    }
}
