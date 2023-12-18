<?php

namespace Database\Seeders;

use App\Models\Transaksi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transaksi::create([
            'status' => 'Belum Bayar',
        ]);

        Transaksi::create([
            'status' => 'Proses',
        ]);

        Transaksi::create([
            'status' => 'Selesai',
        ]);
    }
}
