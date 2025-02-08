<?php

namespace App\Http\Controllers;

use App\Models\Faktur;
use App\Models\Pembayaran;
use Illuminate\Http\Request;


class PembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::with('faktur')->get();
        return view('pembayaran.index', compact('pembayaran'));
    }

    public function create()
    {
        $faktur = Faktur::all();
        return view('pembayaran.create', compact('faktur'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_faktur' => 'required|exists:faktur,no_faktur',
            'harga_satuan' => 'required|numeric',
            'diskon' => 'nullable|numeric',
            'subtotal' => 'required|numeric',
            'total' => 'required|numeric',
            'ppn' => 'required|numeric',
        ]);

        Pembayaran::create($request->all());
        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil ditambahkan!');
    }

    public function edit(Pembayaran $pembayaran)
    {
        $faktur = Faktur::all();
        return view('pembayaran.edit', compact('pembayaran', 'faktur'));
    }

    public function update(Request $request, Pembayaran $pembayaran)
    {
        $request->validate([
            'harga_satuan' => 'required|numeric',
            'diskon' => 'nullable|numeric',
            'subtotal' => 'required|numeric',
            'total' => 'required|numeric',
            'ppn' => 'required|numeric',
        ]);

        $pembayaran->update($request->all());
        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil diperbarui!');
    }

    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();
        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil dihapus!');
    }
}
