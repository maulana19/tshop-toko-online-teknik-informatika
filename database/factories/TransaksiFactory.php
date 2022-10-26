<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TransaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pembeli_id'        => 2,
            'penjual_id'        => 1,
            'karya_id'          => 1,
            'total_barang'      => 1,
            'total_harga'      => 500000,
        ];
    }
}
