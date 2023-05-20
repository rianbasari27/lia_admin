<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReparasiHeader extends Model
{
    use HasFactory;
    protected $table = 'reparasi_header';
    protected $fillable = [
        'kode_reparasi',
        'nama_customer_id',
        'tanggal',
        'total',
        'status_pembayaran',
    ];
    protected $primaryKey = 'kode_reparasi';
    protected $keyType = 'string';
    
    public function customer() {
        return $this->belongsTo(Customer::class, 'nama_customer_id');
    }

    public function reparasi_detail() {
        return $this->hasMany(ReparasiDetail::class);
    }

    public function transaksi_masuk() {
        return $this->hasMany(TransaksiMasuk::class);
    }
}
