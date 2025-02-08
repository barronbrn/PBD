<?php

namespace App\Http\Controllers;

use App\Models\JenisObat;
use Illuminate\Http\Request;

class JenisObatController extends Controller
{
    public function index()
    {
        $jenisObat = JenisObat::all();
        return view('jenis_obat.index', compact('jenisObat'));
    }

    public function create()
    {
        return view('jenis_obat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'satuan' => 'required|unique:jenis_obat',
        ]);

        JenisObat::create($request->all());
        return redirect()->route('jenis-obat.index')->with('success', 'Jenis Obat berhasil ditambahkan');
    }

    public function edit(JenisObat $jenisObat)
    {
        return view('jenis_obat.edit', compact('jenisObat'));
    }

    public function update(Request $request, JenisObat $jenisObat)
    {
        $request->validate([
            'satuan' => 'required|unique:jenis_obat,satuan,' . $jenisObat->id,
        ]);

        $jenisObat->update($request->all());
        return redirect()->route('jenis-obat.index')->with('success', 'Jenis Obat berhasil diperbarui');
    }

    public function destroy(JenisObat $jenisObat)
    {
        $jenisObat->delete();
        return redirect()->route('jenis-obat.index')->with('success', 'Jenis Obat berhasil dihapus');
    }
}
