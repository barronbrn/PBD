<?php

namespace App\Http\Controllers;

use App\Models\Faktur;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class FakturController extends Controller
{
    public function index()
    {
        $faktur = Faktur::with('pelanggan')->get();
        return view('faktur.index', compact('faktur'));
    }

    public function create()
    {
        $pelanggan = Pelanggan::all();
        return view('faktur.create', compact('pelanggan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_faktur' => 'required|unique:faktur',
            'tanggal_faktur' => 'required|date',
            'pelanggan_id' => 'required|exists:pelanggan,id',
        ]);

        Faktur::create($request->all());
        return redirect()->route('faktur.index')->with('success', 'Faktur berhasil ditambahkan!');
    }

    public function edit(Faktur $faktur)
    {
        $pelanggan = Pelanggan::all();
        return view('faktur.edit', compact('faktur', 'pelanggan'));
    }

    public function update(Request $request, Faktur $faktur)
    {
        $request->validate([
            'tanggal_faktur' => 'required|date',
            'pelanggan_id' => 'required|exists:pelanggan,id',
        ]);

        $faktur->update($request->all());
        return redirect()->route('faktur.index')->with('success', 'Faktur berhasil diperbarui!');
    }

    public function destroy(Faktur $faktur)
    {
        $faktur->delete();
        return redirect()->route('faktur.index')->with('success', 'Faktur berhasil dihapus!');
    }
}
