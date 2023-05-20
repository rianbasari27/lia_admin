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
        'nama_sparepart_id',
        'jumlah',
        'satuan',
        'biaya',
        'total',
    ];

    public function pembelian_header() {
        return $this->belongsTo(PembelianHeader::class, 'kode_pembelian');
    }

    public function sparepart() {
        return $this->belongsTo(Sparepart::class, 'nama_sparepart_id');
    }
    
}
