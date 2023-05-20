<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransaksiMasuk extends Model
{
    use HasFactory;
    protected $table = "transaksi_masuk";
    protected $fillable = [
        'kode_transaksi',
        'nama_customer_id',
        'kode_reparasi',
        'tanggal',
        'tujuan_pembayaran',
        'nominal',
        'keterangan',
    ];

    public function customer() {
        return $this->belongsTo(Customer::class, 'nama_customer_id');
    }

    public function reparasi_header() {
        return $this->belongsTo(ReparasiHeader::class, 'kode_reparasi');
    }
}
