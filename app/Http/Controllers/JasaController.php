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
        // Validate the request data
        $request->validate([
            'nama_jasa' => 'required|string|max:255',
            'harga_jasa' => 'required|numeric',
            'deskripsi' => 'required|string',
            // Add validation rules for other fields as needed
        ]);

        // Find the existing record
        $jasa = Jasa::find($id);

        // Update the data in the database
        $jasa->update([
            'nama_jasa' => $request->input('nama_jasa'),
            'harga_jasa' => $request->input('harga_jasa'),
            'deskripsi' => $request->input('deskripsi'),
            'foto_desain' => $request->input('foto_desain'),
        ]);

        // Add a success flash message
        Session::flash('success', 'Data updated successfully');

        return redirect()->route('admin.paketjasa');
    }


    public function destroy($id)
    {
        // Find the record and delete it
        Jasa::findOrFail($id)->delete();

        return redirect()->route('admin.paketjasa')->with('success', 'Data deleted successfully');
    }
}
