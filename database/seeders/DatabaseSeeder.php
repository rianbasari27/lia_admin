<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Customer;
use App\Models\Sparepart;
use App\Models\JenisBarang;
use Illuminate\Support\Arr;
use Illuminate\Database\Seeder;
use App\Models\PembelianSparepart;
use App\Models\TransaksiKeluarDetail;
use App\Models\TransaksiKeluarHeader;
use App\Models\TransaksiMasuk;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        
        User::factory()->count(2)->create();
        Customer::factory()->count(10)->create();
        // Sparepart::factory()->count(8)->create();
        // JenisBarang::factory()->count(7)->create();
        
        $jenis_barang = ['Tas', 'Koper', 'Sepatu', 'Sandal', 'Dompet', 'Vermak', 'Aksesoris',];
        foreach ($jenis_barang as $item) {
            DB::table('jenis_barang')->insert([
                'nama_barang' => $item,
                'created_at' => date('Y/m/d H:i:s'),
                'updated_at' => date('Y/m/d H:i:s')
            ]);
        }
        
        $sparepart = ['Resleting', 'Perekat', 'Bahan imitasi', 'Roda koper', 'Gagang koper', 'Sol sepatu', 'Benang jahit', 'Kain katun'];
        foreach ($sparepart as $item) {
            DB::table('sparepart')->insert([
                'nama_sparepart' => $item,
                'stok' => rand(1,100),
                'satuan' => Arr::random(['Pcs', 'Dus', 'Lusin', 'Kg', 'Meter']),
                'created_at' => date('Y/m/d H:i:s'),
                'updated_at' => date('Y/m/d H:i:s')
            ]);
        }
        
        TransaksiMasuk::factory()->count(1)->create();
        TransaksiKeluarHeader::factory()->count(1)->create();
        TransaksiKeluarDetail::factory()->count(1)->create();
        // PembelianHeader::factory()->count(20)->create();
    }
}
