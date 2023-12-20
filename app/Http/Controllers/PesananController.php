<?php
namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Client;
use App\Models\Jasa;
use App\Http\Controllers\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{
    public function pesanan()
    {
        $title = 'Manajemen Pesanan';
        $pesanan = Pesanan::with(['jasa', 'client', 'transaksi'])->get();
        return view('back.pages.admin.manajemenPesan', compact('pesanan', 'title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'foto_desain' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            'jumlah_pesan' => 'required|numeric',
            'deskripsi' => 'required|string',
        ]);

        // Ambil ID jasa yang dipilih oleh pengguna
        $jasaId = $request->input('jasa_id');

        // Ambil data Jasa yang sesuai dengan ID yang dipilih
        $jasa = Jasa::findOrFail($jasaId);

        // Ambil ID client yang sedang melakukan pemesanan (sesuaikan dengan kebutuhan aplikasi Anda)
        $clientId = auth()->user()->id; // Misalnya, mengambil ID client dari user yang sedang login

        // Ambil data Client berdasarkan ID yang ditemukan
        $client = Client::findOrFail($clientId);

        // Buat nomor pesanan yang unik
        $noPesanan = uniqid();

        $image = $request->file('foto_desain');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('upload_folder'), $imageName);

        $data = [
            'jasa_id' => $jasa->id,
            'client_id' => $client->id,
            'no_pesanan' => $noPesanan,
            'nama_jasa' => $jasa->nama_jasa,
            'nama_pemesan' => $client->name,
            'jumlah' => $request->input('jumlah_pesan'),
            'deskripsi' => $request->input('deskripsi'),
            'foto_desain' => $imageName,
            'harga_total' => $jasa->harga_jasa * $request->input('jumlah_pesan'),
            'created_at' => now(),
            'updated_at' => now(),
        ];

        Pesanan::create($data);

        session()->flash('sukses', 'Data berhasil ditambah');
        return redirect()->route('client.home');
    }

    public function edit($id)
    {
        // mengambil data untuk memberikan ID dan di passing kedalam view
        $data = Pesanan::findOrFail($id);
        $title = "Edit Pesanan $data->nama_jasa";
        return view('back.pages.client.edit', compact('title', 'data'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'jumlah_pesan' => 'required|numeric',
            'deskripsi' => 'required|string',
            'foto_desain' => 'image|mimes:jpeg,png,jpg,gif|max:5000',
        ]);

        // Temukan data yang akan diupdate
        $pesanan = Pesanan::findOrFail($id);
        $oldData = $pesanan->toArray();

        // Handling foto
        if ($request->hasFile('foto_desain')) {
            // Hapus foto lama jika ada
            if ($pesanan->foto_desain) {
                unlink(public_path('upload_folder/' . $pesanan->foto_desain));
            }

            // Upload foto baru
            $image = $request->file('foto_desain');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload_folder'), $imageName);

            // Update 'foto_desain' area di database
            $pesanan->update(['foto_desain' => $imageName]);
        }

        // Update data dengan nilai baru
        $pesanan->update([
            'jumlah' => $request->input('jumlah_pesan'),
            'deskripsi' => $request->input('deskripsi'),
        ]);

        // mendapatkan data yang terupdate
        $updatedData = $pesanan->fresh()->toArray();
        $isUpdated = $oldData !== $updatedData;

        return redirect()->route('client.pesan')->with([
            'success' => true,
            'message' => $isUpdated ? 'Data berhasil diupdate' : 'Tidak ada perubahan pada data',
        ]);
    }

    public function destroy($id)
    {
        // mencari histori id dan hapus
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->delete();

        // Berikan respons JSON
        return response()->json(['message' => 'Data berhasil dihapus']);
    }

    public function showPesanan()
    {
        $data = Pesanan::with(['jasa', 'client'])->get();
        $title = 'Pesananmu!';
        return view('back.pages.client.pesan', compact('title', 'data'));
    }

    // Fungsi untuk mengupload bukti transfer dari client 
    public function payment(Request $request, $id)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        ]);

        // Find the pesanan by ID
        $pesanan = Pesanan::findOrFail($id);

        // Check if the pesanan is already paid
        if ($pesanan->bukti_pembayaran) {
            return redirect()->route('client.pesan')->with([
                'error' => true,
                'message' => 'Pesanan sudah dibayar sebelumnya.',
            ]);
        }

        // Upload bukti pembayaran baru
        $image = $request->file('bukti_pembayaran');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('bukti_pembayaran'), $imageName);

        // Update bukti_pembayaran field in the database
        $pesanan->update(['bukti_pembayaran' => $imageName]);

        return redirect()->route('client.pesan')->with([
            'success' => true,
            'message' => 'Bukti pembayaran berhasil diunggah.',
        ]);
    }

    public function showClientPesanan()
    {
        $title = 'Transaksi Pesanan';
        $pesanan = Pesanan::with(['jasa', 'client', 'transaksi'])->get();
        return view('back.pages.client.transaksi', compact('pesanan', 'title'));
    }


    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        // menemukan pesanan berdasarkan ID
        $pesanan = Pesanan::findOrFail($id);

        // Update bukti_pembayaran field di database
        $pesanan->update(['status' => $request->input('status')]);

        return redirect()->route('admin.manajemenPesan')->with([
            'success' => true,
            'message' => 'Status pemesanan berhasil diubah',
        ]);
    }

    // Controller hitung total pendapatan
    public function totalPendapatan()
    {
        // Mendapatkan total pendapatan dari pesanan-pesanan yang sudah selesai
        $totalPendapatan = Pesanan::where('status', 'Selesai')->sum('harga_total');

        return view('back.pages.admin.home', compact('totalPendapatan'));
    }

    public function showPemilikPesanan()
    {
        $title = 'Laporan Transaksi';
        $pesanan = Pesanan::with(['jasa', 'client', 'transaksi'])->get();
        return view('back.pages.pemilik.laporanTransaksi', compact('pesanan', 'title'));
    }


}