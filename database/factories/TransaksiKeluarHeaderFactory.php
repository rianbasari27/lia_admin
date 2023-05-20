<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TransaksiKeluarHeader>
 */
class TransaksiKeluarHeaderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode_transaksi' => 'TK-1',
            'tanggal' => date('Y/m/d'),
            'transaksi_tujuan' => 'Toko Indah Lestari',
            'total' => rand(10, 500) . '000',
            'created_at' => date('Y/m/d H:i:s'),
            'updated_at' => date('Y/m/d H:i:s')
        ];
    }
}
