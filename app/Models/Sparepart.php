<?php

namespace App\Models;

use App\Models\PembelianSparepart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sparepart extends Model
{
    use HasFactory;
    protected $table = 'sparepart';
    protected $fillable = [
        'nama_sparepart',
        'stok',
        'satuan',
    ];

    public function pembelian_sparepart() {
        return $this->hasMany(PembelianSparepart::class);
    }
}
