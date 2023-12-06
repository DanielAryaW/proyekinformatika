<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Client;
use App\Models\Jasa;

class PesananController extends Controller
{
    public function pesanan()
    {
        $title = 'Pesananmu!';
        $data = Pesanan::get();
        return view('back.pages.client.pesan', compact('title', 'data'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'foto_desain' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = null;
        if ($request->hasFile('foto_desain')) {
            $image = $request->file('foto_desain');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload_folder'), $imageName);
        }

        $jumlahPesan = intval($request->input('jumlah_pesan'));

        $data = [
            'jumlah' => $jumlahPesan,
            'deskripsi' => $request->input('deskripsi'),
            'foto_desain' => $imageName,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        session()->flash('sukses', 'Data berhasil ditambah');
        Pesanan::insert($data);

        return redirect()->route('client.pesan');
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'jumlah_pesan' => 'required|numeric',
            'deskripsi' => 'required|string',
            'foto_desain' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Temukan data yang akan diupdate
        $pesanan = Pesanan::findOrFail($id);
        $oldData = $pesanan->toArray();

        // handling foto
        if ($request->hasFile('foto_desain')) {
            // Hapus foto lama jika ada
            if ($pesanan->foto_desain) {
                unlink(public_path('upload_folder/' . $pesanan->foto_desain));
            }

            // Upload foto baru
            $image = $request->file('foto_desain');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload_folder'), $imageName);

            // Update the 'foto_desain' field in the database
            $pesanan->update(['foto_desain' => $imageName]);
        }

        // Update data dengan nilai baru
        $pesanan->update([
            'jumlah' => $request->input('jumlah_pesan'),
            'deskripsi' => $request->input('deskripsi'),
        ]);

        // Get the updated data
        $updatedData = $pesanan->fresh()->toArray();
        $isUpdated = $oldData !== $updatedData;

        return redirect()->route('client.pesan')->with([
            'success' => true,
            'message' => $isUpdated ? 'Data berhasil diupdate' : 'Tidak ada perubahan pada data',
        ]);
    }
    // return response()->json([
    //     'success' => true,
    //     'message' => 'Data berhasil diupdate',
    //     // 'data' => $updatedData,
    // ]);

}

