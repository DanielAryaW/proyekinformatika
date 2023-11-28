<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Client;

class PesananController extends Controller
{
    public function pesanJasa(Request $request)
    {
        // Validasi formulir jika diperlukan
        $request->validate([
            // Sesuaikan dengan kebutuhan validasi Anda
            'file' => 'required|mimes:jpeg,png|max:10240', // Contoh validasi untuk file gambar (maksimum 10MB)
            'quantity' => 'required|integer|min:1',
            'deskripsi' => 'required|string',
            'namaJasa' => 'required|string',
            'hargaJasa' => 'required|numeric',
        ]);

        // Simpan pesanan ke dalam tabel Pesanan
        $pesanan = new Pesanan([
            'file' => $request->file('file')->store('upload_folder'), // Simpan gambar ke direktori yang diinginkan
            'quantity' => $request->input('quantity'),
            'deskripsi' => $request->input('deskripsi'),
            'namaJasa' => $request->input('namaJasa'),
            'hargaJasa' => $request->input('hargaJasa'),
            // Sesuaikan dengan kolom-kolom lain di tabel Pesanan
        ]);

        // Sesuaikan dengan nama kolom di tabel Client
        $client = Client::where('email', auth()->user()->email)->first();

        // Hubungkan pesanan dengan client
        $client->pesanan()->save($pesanan);

        // Tambahkan response atau redirect ke halaman yang sesuai
        return response()->json(['message' => 'Pesanan berhasil disimpan']);
    }
}
