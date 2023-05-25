<?php

namespace App\Models;

use App\Models\Customer;
use App\Models\JenisBarang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Kyslik\ColumnSortable\Sortable;

class Reparasi extends Model
{
    use HasFactory;
    use Sortable;
    protected $table = 'reparasi';
    protected $fillable = [
        'no_reparasi',
        'nama_customer_id',
        'tanggal',
        'nama_barang_id',
        'lainnya',
        'jml_barang',
        'kerusakan',
        'perbaikan',
        'biaya',
    ];
    public $sortable = [
        'kode_reparasi',
        'nama_customer_id',
        'tanggal',
        'nama_barang_id',
    ];


    public function jenis_barang() {
        return $this->belongsTo(JenisBarang::class);
    }
    
    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function transaksi_masuk() {
        return $this->hasMany(TransaksiMasuk::class);
    }

    
}
