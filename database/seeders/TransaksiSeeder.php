<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Transaksi::factory(1)->create();
    }
}
