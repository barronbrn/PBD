<?php

namespace App\Http\Controllers;

use App\Models\JenisObat;
use Illuminate\Http\Request;

class JenisObatController extends Controller
{
    // Menampilkan daftar jenis obat
    public function index()
    {
        $jenisObat = JenisObat::all();
        return view('jenis_obat.index', compact('jenisObat'));
    }

    // Menampilkan form tambah jenis obat
    public function create()
    {
        return view('jenis_obat.create');
    }

    // Menyimpan data jenis obat baru
    public function store(Request $request)
    {
        $request->validate([
            'satuan' => 'required|unique:jenis_obat,satuan',
        ]);

        JenisObat::create($request->all());

        return redirect()->route('jenis-obat.index')
            ->with('success', 'Jenis Obat berhasil ditambahkan.');
    }

    // Menampilkan form edit jenis obat
    public function edit($id)
    {
        $jenisObat = JenisObat::findOrFail($id);
        return view('jenis_obat.edit', compact('jenisObat'));
    }

    // Mengupdate data jenis obat
    public function update(Request $request, $id)
    {
        $request->validate([
            'satuan' => 'required|unique:jenis_obat,satuan,' . $id,
        ]);

        $jenisObat = JenisObat::findOrFail($id);
        $jenisObat->update($request->all());

        return redirect()->route('jenis-obat.index')
            ->with('success', 'Jenis Obat berhasil diperbarui.');
    }

    // Menghapus data jenis obat
    public function destroy($id)
    {
        $jenisObat = JenisObat::findOrFail($id);
        $jenisObat->delete();

        return redirect()->route('jenis-obat.index')
            ->with('success', 'Jenis Obat berhasil dihapus.');
    }
}
