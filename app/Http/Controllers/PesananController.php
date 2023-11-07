<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function simpanPesanan(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg',
            'jumlah_pesanan' => 'required|integer',
        ]);

        $gambarPath = $request->file('gambar')->store('gambar'); // Simpan gambar ke direktori "storage/app/gambar"

        $totalHarga = $request->jumlah_pesanan * 5000; // Harga per item

        Pesanan::create([
            'gambar_path' => $gambarPath,
            'jumlah_pesanan' => $request->jumlah_pesanan,
            'total_harga' => $totalHarga,
        ]);

        return redirect()->back()->with('success', 'Pesanan berhasil disimpan.');
    }

}