<?php

namespace App\Models;

use App\Models\Reparasi;
use App\Models\TransaksiMasuk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customer';
    protected $fillable = [
        'nama_customer',
        'no_telepon',
        'alamat',
    ];

    public function reparasi_header() {
        return $this->hasMany(ReparasiHeader::class);
    }

    public function transaksi_masuk() {
        return $this->hasMany(TransaksiMasuk::class);
    }
}
