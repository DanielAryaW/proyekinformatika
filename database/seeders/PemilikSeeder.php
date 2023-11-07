<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Pemilik;


class PemilikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pemilik::create([
            'name' => 'Boss',
            'username' => 'Pak Boss',
            'email' => 'pemilik@gmail.com',
            'password' => Hash::make('12345')
        ]);
    }
}