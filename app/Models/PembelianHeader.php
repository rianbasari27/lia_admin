<?php

namespace App\Models;

use App\Models\Sparepart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PembelianHeader extends Model
{
    use HasFactory;
    protected $table = 'pembelian_header';
    protected $fillable = [
        'kode_pembelian',
        'tanggal',
        'tempat_pembelian',
    ];

    public function pembelian_detail() {
        return $this->hasMany(PembelianDetail::class);
    }

}
