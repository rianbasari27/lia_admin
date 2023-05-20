<?php

namespace Database\Factories;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JenisBarang>
 */
class JenisBarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $jenis_barang = [
            'Tas',
            'Koper',
            'Sepatu',
            'Sandal',
            'Dompet',
            'Vermak',
            'Aksesoris',
        ];

        foreach ($jenis_barang as $item) {
            return [
                'nama_barang' => Arr::sort([
                    'Tas',
                    'Koper',
                    'Sepatu',
                    'Sandal',
                    'Dompet',
                    'Vermak',
                    'Aksesoris',
                ]),
                'created_at' => date('Y/m/d H:i:s'),
                'updated_at' => date('Y/m/d H:i:s')
            ];
        }
    }
}
