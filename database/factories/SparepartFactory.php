<?php

namespace Database\Factories;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sparepart>
 */
class SparepartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = faker::create('id_ID');
        return [
            'nama_sparepart' => Arr::random([
                'Resleting',
                'Perekat',
                'Bahan imitasi',
                'Roda koper',
                'Gagang koper',
                'Sol sepatu',
                'Benang jahit',
                'Kain katun'
            ]),
            'stok' => $faker->randomNumber(3, false),
            'satuan' => Arr::random(['Pcs', 'Dus', 'Lusin', 'Kg', 'Meter']),
            'created_at' => date('Y/m/d H:i:s'),
            'updated_at' => date('Y/m/d H:i:s')
        ];
    }
}
