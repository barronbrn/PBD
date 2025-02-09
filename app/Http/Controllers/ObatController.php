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
        // Validasi input
        $request->validate([
            'kode' => 'required|unique:obat,kode',
            'nama_obat' => 'required',
            'jenis_obat' => 'required|exists:jenis_obat,id',
            'harga_pokok' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        // Simpan data obat
        Obat::create([
            'kode' => $request->kode,
            'nama_obat' => $request->nama_obat,
            'id_jenis_obat' => $request->jenis_obat,
            'harga_pokok' => $request->harga_pokok,
            'stock' => $request->stock,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('obat.index')->with('success', 'Obat berhasil ditambahkan.');
    }

    // Menampilkan form edit obat
    public function edit($kode)
    {
        $obat = Obat::findOrFail($kode); // Ambil data obat berdasarkan kode
        $jenisObat = JenisObat::all(); // Ambil semua data jenis obat untuk dropdow
        return view('obat.edit', compact('obat', 'jenisObat'));
    }

    // Mengupdate data obat
    public function update(Request $request, $kode)
    {
        // Validasi input
        $request->validate([
            'nama_obat' => 'required',
            'id_jenis_obat' => 'required|exists:jenis_obat,id',
            'harga_pokok' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        // Ambil data obat berdasarkan kode
        $obat = Obat::findOrFail($kode);

        // Update data obat
        $obat->update([
            'nama_obat' => $request->nama_obat,
            'id_jenis_obat' => $request->id_jenis_obat,
            'harga_pokok' => $request->harga_pokok,
            'stock' => $request->stock,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('obat.index')->with('success', 'Obat berhasil diperbarui.');
    }

    // Menghapus data obat
    public function destroy($kode)
    {
        $obat = Obat::findOrFail($kode);
        $obat->delete();
        return redirect()->route('obat.index')->with('success', 'Obat berhasil dihapus');
    }
}
