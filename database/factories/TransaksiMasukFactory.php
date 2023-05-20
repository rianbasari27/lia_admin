<?php

namespace Database\Factories;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TransaksiMasuk>
 */
class TransaksiMasukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $faker = faker::create('id_ID');
        return [
            'kode_transaksi' => 'TM-1',
            'nama_customer_id' => rand(1, 10),
            'kode_reparasi' => 'LIA00000'.rand(1, 9),
            'tanggal' => date('Y/m/d'),
            'tujuan_pembayaran' => Arr::random(['Pelunasan', 'Uang muka']),
            'nominal' => rand(1, 3) . '000',
            'created_at' => date('Y/m/d H:i:s'),
            'updated_at' => date('Y/m/d H:i:s')
        ];
    }
}
