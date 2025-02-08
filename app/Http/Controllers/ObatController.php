<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    // Menampilkan semua data obat
    public function index()
    {
        $obat = Obat::all();
        return view('obat.index', compact('obat'));
    }

    // Menampilkan form tambah obat
    public function create()
    {
        return view('obat.create');
    }

    // Menyimpan data obat baru
    public function store(Request $request)
    {
        $request->validate([
            'kode_obat' => 'required|unique:obat',
            'nama_obat' => 'required',
            'harga_satuan' => 'required|numeric',
            'no_batch' => 'required',
            'stok' => 'required|integer'
        ]);

        Obat::create($request->all());
        return redirect()->route('obat.index')->with('success', 'Obat berhasil ditambahkan.');
    }

    // Menampilkan form edit obat
    public function edit($kode_obat)
    {
        $obat = Obat::findOrFail($kode_obat);
        return view('obat.edit', compact('obat'));
    }

    // UPDATE data obat
    public function update(Request $request, $kode_obat)
    {
        $request->validate([
            'nama_obat' => 'required',
            'harga_satuan' => 'required|numeric',
            'no_batch' => 'required',
            'stok' => 'required|integer'
        ]);

        $obat = Obat::findOrFail($kode_obat);
        $obat->update($request->all());
        return redirect()->route('obat.index')->with('success', 'Obat berhasil diperbarui.');
    }

    // DELETE obat
    public function destroy($kode_obat)
    {
        $obat = Obat::findOrFail($kode_obat);
        $obat->delete();
        return redirect()->route('obat.index')->with('success', 'Obat berhasil dihapus.');
    }
}
