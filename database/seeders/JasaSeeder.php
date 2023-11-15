<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jasa;

class JasaSeeder extends Seeder
{
    public function run()
    {
        // Contoh data jasa
        Jasa::create([
            'nama_jasa' => 'Cetak Amplop',
            'harga_jasa' => 5000,
            'deskripsi' => 'Cetak amplop custom dengan harga terjangkau',
            'foto_desain' => '\back\vendors\images\jasa_1.jpeg',
        ]);

        Jasa::create([
            'nama_jasa' => 'Cetak X Banner',
            'harga_jasa' => 100000,
            'deskripsi' => 'Cetak X banner ukuran 60 x 160cm dengan harga terjangkau.',
            'foto_desain' => '\back\vendors\images\jasa_2.jpeg',
        ]);

        // Tambahkan data jasa lainnya sesuai kebutuhan
    }
}
