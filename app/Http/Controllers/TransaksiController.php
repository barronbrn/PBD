<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    // Menampilkan daftar transaksi
    public function index()
    {
        $transaksi = Transaksi::with('obat')->get();
        return view('transaksi.index', compact('transaksi'));
    }

    // Menampilkan form tambah transaksi
    public function create()
    {
        $obat = Obat::all();
        return view('transaksi.create', compact('obat'));
    }

    // Menyimpan data transaksi baru
    public function store(Request $request)
    {
        $request->validate([
            'no_transaksi' => 'required',
            'kode_obat' => 'required|exists:obat,kode',
            'qty' => 'required|integer',
            'selisih' => 'required|numeric',
            'nilai_buku' => 'required|numeric',
            'nilai_fisik' => 'required|numeric',
            'selisih_nilai' => 'required|numeric',
        ]);

        Transaksi::create($request->all());

        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi berhasil ditambahkan.');
    }

    // Menampilkan form edit transaksi
    public function edit($noTransaksi, $kodeObat)
    {
        $transaksi = Transaksi::where('no_transaksi', $noTransaksi)
            ->where('kode_obat', $kodeObat)
            ->firstOrFail();
        $obat = Obat::all();
        return view('transaksi.edit', compact('transaksi', 'obat'));
    }

    // Mengupdate data transaksi
    public function update(Request $request, $noTransaksi, $kodeObat)
    {
        $request->validate([
            'qty' => 'required|integer',
            'selisih' => 'required|numeric',
            'nilai_buku' => 'required|numeric',
            'nilai_fisik' => 'required|numeric',
            'selisih_nilai' => 'required|numeric',
        ]);

        $transaksi = Transaksi::where('no_transaksi', $noTransaksi)
            ->where('kode_obat', $kodeObat)
            ->firstOrFail();
        $transaksi->update($request->all());

        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi berhasil diperbarui.');
    }

    // Menghapus data transaksi
    public function destroy($noTransaksi, $kodeObat)
    {
        // Pastikan data transaksi yang akan dihapus ada
        $transaksi = Transaksi::where('no_transaksi', $noTransaksi)
            ->where('kode_obat', $kodeObat)
            ->first(); // Gunakan first(), bukan findOrFail()

        if (!$transaksi) {
            return redirect()->route('transaksi.index')
            ->with('error', 'Transaksi tidak ditemukan.');
        }

        $transaksi->delete();

        return redirect()->route('transaksi.index')
        ->with('success', 'Transaksi berhasil dihapus.');
    }
}
