<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\JenisObat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    // Menampilkan daftar obat
    public function index()
    {
        $obat = Obat::with('jenisObat')->get(); // Ambil data obat beserta relasi jenis obat
        return view('obat.index', compact('obat'));
    }

    // Menampilkan form tambah obat
    public function create()
    {
        $jenisObat = JenisObat::all(); // Ambil semua data jenis obat untuk dropdown
        return view('obat.create', compact('jenisObat'));
    }

    // Menyimpan data obat baru
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:obat,kode',
            'obat' => 'required',
            'fiskk' => 'required',
            'nama_obat' => 'required',
            'id_jenis_obat' => 'required|exists:jenis_obat,id',
            'harga_pokok' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        Obat::create($request->all());
        return redirect()->route('obat.index')->with('success', 'Obat berhasil ditambahkan');
    }

    // Menampilkan form edit obat
    public function edit($kode)
    {
        $obat = Obat::findOrFail($kode); // Ambil data obat berdasarkan kode
        $jenisObat = JenisObat::all(); // Ambil semua data jenis obat untuk dropdown
        return view('obat.edit', compact('obat', 'jenisObat'));
    }

    // Mengupdate data obat
    public function update(Request $request, $kode)
    {
        $request->validate([
            'obat' => 'required',
            'fiskk' => 'required',
            'nama_obat' => 'required',
            'id_jenis_obat' => 'required|exists:jenis_obat,id',
            'harga_pokok' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $obat = Obat::findOrFail($kode);
        $obat->update($request->all());
        return redirect()->route('obat.index')->with('success', 'Obat berhasil diperbarui');
    }

    // Menghapus data obat
    public function destroy($kode)
    {
        $obat = Obat::findOrFail($kode);
        $obat->delete();
        return redirect()->route('obat.index')->with('success', 'Obat berhasil dihapus');
    }
}
