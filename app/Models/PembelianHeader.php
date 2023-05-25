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
        'nama_supplier_id',
        'tanggal',
        'total',
    ];

    public function pembelian_detail() {
        return $this->hasMany(PembelianDetail::class);
    }

    public function supplier() {
        return $this->belongsTo(Supplier::class);
    }

}
