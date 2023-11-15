<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        if ($request->hasFile('foto_desain')) {
            $image = $request->file('foto_desain');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload_folder'), $imageName);
        }

        $data = [
            'nama_jasa' => $request->input('nama'),
            'harga_jasa' => $request->input('harga'),
            'deskripsi' => $request->input('deskripsi'),
            'foto_desain' => $imageName,
            'created_at' => now(),
            'updated_at' => now(),
        ];
        session()->flash('sukses', 'Data berhasil ditambah');
        Jasa::insert($data);
        return redirect()->route('admin.paketjasa');
    }

}
