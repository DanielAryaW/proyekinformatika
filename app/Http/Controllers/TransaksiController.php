<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Pesanan;

class TransaksiController extends Controller
{


    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required|in:Pending,Proses,Selesai'
        ]);

        // Ambil ID jasa yang dipilih oleh pengguna
        $pesananId = $request->input('pesanan_id');

        // Ambil data Jasa yang sesuai dengan ID yang dipilih
        $pesanan = Pesanan::findOrFail($pesananId);

        // Buat nomor pesanan yang unik
        $noPesanan = uniqid();


        $data = [
            'status' => $request->status,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        Transaksi::create($data);

        session()->flash('sukses', 'Data berhasil ditambah');
        return redirect()->route('client.home');
    }

    public function updateStatus(Request $request, $id)
    {
        // Validasi status agar hanya bisa diubah ke status yang valid
        $request->validate([
            'status' => 'required|in:Pending,Proses,Selesai',
        ]);

        // Temukan transaksi berdasarkan ID
        $transaksi = Transaksi::findOrFail($id);

        // Update status transaksi
        $transaksi->update([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Status pemesanan berhasil diubah.');
    }

    // Tambahkan fungsi getStatusColor
    private function getStatusColor($status)
    {
        switch ($status) {
            case 'Pending':
                return '#ffcccb'; // Warna merah muda
            case 'Proses':
                return '#ffd700'; // Warna kuning
            case 'Selesai':
                return '#90ee90'; // Warna hijau
            default:
                return '#ffffff'; // Warna putih jika status tidak dikenali
        }
    }
}
