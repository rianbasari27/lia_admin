<?php

namespace App\Models;

use App\Models\ReparasiDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JenisBarang extends Model
{
    use HasFactory;
    protected $table = 'jenis_barang';
    protected $fillable = [
        'nama_barang',
    ];

    public function reparasi_detail() {
        return $this->hasMany(ReparasiDetail::class);
    }
}
