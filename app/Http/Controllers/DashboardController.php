<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Faktur;
use App\Models\JenisObat;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        // Hitung total obat
        $totalObat = Obat::count();

        // Hitung total jenis obat
        $totalJenisObat = JenisObat::count();

        // Hitung total transaksi
        $totalTransaksi = Transaksi::count();

        // Hitung total stok obat
        $totalStokObat = Obat::sum('stock');

        // Ambil 5 transaksi terbaru
        $transaksiTerbaru = Transaksi::with('obat')
        ->orderBy('created_at', 'desc')
        ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalObat',
            'totalJenisObat',
            'totalTransaksi',
            'totalStokObat',
            'transaksiTerbaru'
        ));
    }
}
