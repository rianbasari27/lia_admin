<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianDetail extends Model
{
    use HasFactory;
    protected $table = 'pembelian_detail';
    protected $fillable = [
        'kode_pembelian',
        'nama_barang',
        'jumlah',
        'satuan',
        'biaya',
    ];

    public function pembelian_header() {
        return $this->belongsTo(PembelianHeader::class, 'kode_pembelian');
    }

    
}
