<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Faktur;
use App\Models\FakturObat;
use Illuminate\Http\Request;

class FakturObatController extends Controller
{
    public function index()
    {
        $faktur_obat = FakturObat::with(['faktur', 'obat'])->get();
        return view('faktur_obat.index', compact('faktur_obat'));
    }

    public function create()
    {
        $faktur = Faktur::all();
        $obat = Obat::all();
        return view('faktur_obat.create', compact('faktur', 'obat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_faktur' => 'required|exists:faktur,no_faktur',
            'kode_obat' => 'required|exists:obat,kode_obat',
            'jumlah' => 'required|integer|min:1',
        ]);

        FakturObat::create($request->all());
        return redirect()->route('faktur_obat.index')->with('success', 'Faktur Obat berhasil ditambahkan!');
    }

    public function edit(FakturObat $fakturObat)
    {
        $faktur = Faktur::all();
        $obat = Obat::all();
        return view('faktur_obat.edit', compact('fakturObat', 'faktur', 'obat'));
    }

    public function update(Request $request, FakturObat $fakturObat)
    {
        $request->validate([
            'jumlah' => 'required|integer|min:1',
        ]);

        $fakturObat->update($request->all());
        return redirect()->route('faktur_obat.index')->with('success', 'Faktur Obat berhasil diperbarui!');
    }

    public function destroy(FakturObat $fakturObat)
    {
        $fakturObat->delete();
        return redirect()->route('faktur_obat.index')->with('success', 'Faktur Obat berhasil dihapus!');
    }
}
