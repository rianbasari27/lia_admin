<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReparasiDetail extends Model
{
    use HasFactory;
    protected $table = 'reparasi_detail';
    protected $fillable = [
        'kode_reparasi',
        'nama_barang_id',
        'jumlah',
        'kerusakan',
        'biaya',
    ];

    public function reparasi_header() {
        return $this->belongsTo(ReparasiHeader::class, 'kode_reparasi');
    }

    public function jenis_barang() {
        return $this->belongsTo(JenisBarang::class, 'nama_barang_id');
    }
    

    public function transaksi_masuk() {
        return $this->hasMany(TransaksiMasuk::class);
    }
}
