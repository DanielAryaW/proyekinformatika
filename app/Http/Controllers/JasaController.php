<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class JasaController extends Controller
{
    public function jasa()
    {
        $title = 'Paket Jasa';
        $data = Jasa::get();
        return view('back.pages.admin.paketjasa', compact('title', 'data'));
    }

    public function create()
    {
        $title = 'Tambah Paket Jasa';
        return view('back.pages.admin.add', compact('title'));
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

        $hargaJasa = intval($request->input('harga'));

        $data = [
            'nama_jasa' => $request->input('nama'),
            'harga_jasa' => $hargaJasa,
            'deskripsi' => $request->input('deskripsi'),
            'foto_desain' => $imageName,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        session()->flash('sukses', 'Data berhasil ditambah');
        Jasa::insert($data);

        return redirect()->route('admin.paketjasa');
    }

    public function showJasas()
    {
        $data = Jasa::get();
        return view('back.pages.client.home', compact('data'));
    }

    public function edit($id)
    {
        // Fetch the data for the given ID and pass it to the view
        $data = Jasa::findOrFail($id);
        $title = "Edit Paket $data->nama_jasa";
        return view('back.pages.admin.edit', compact('title', 'data'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string',
            'foto_desain' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Temukan data yang akan diupdate
        $jasa = Jasa::findOrFail($id);
        $oldData = $jasa->toArray();

        // handling foto
        if ($request->hasFile('foto_desain')) {
            // Hapus foto lama jika ada
            if ($jasa->foto_desain) {
                unlink(public_path('upload_folder/' . $jasa->foto_desain));
            }

            // Upload foto baru
            $image = $request->file('foto_desain');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload_folder'), $imageName);

            // Update the 'foto_desain' field in the database
            $jasa->update(['foto_desain' => $imageName]);
        }


        // Update data dengan nilai baru
        $jasa->update([
            'nama_jasa' => $request->input('nama'),
            'harga_jasa' => $request->input('harga'),
            'deskripsi' => $request->input('deskripsi'),
        ]);

        // Get the updated data
        $updatedData = $jasa->fresh()->toArray();
        $isUpdated = $oldData !== $updatedData;

        return redirect()->route('admin.paketjasa')->with([
            'success' => true,
            'message' => $isUpdated ? 'Data berhasil diupdate' : 'Tidak ada perubahan pada data',
        ]);

        // return response()->json([
        //     'success' => true,
        //     'message' => 'Data berhasil diupdate',
        //     // 'data' => $updatedData,
        // ]);
    }

    public function destroy($id)
    {
        // Find the record and delete it
        $jasa = Jasa::findOrFail($id);
        $jasa->delete();

        // Berikan respons JSON
        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}