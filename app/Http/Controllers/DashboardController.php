<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Faktur;
use App\Models\Pelanggan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        return view('dashboard', [
            'totalFaktur' => Faktur::count(),
            'totalObat' => Obat::count(),
            'totalPelanggan' => Pelanggan::count(),
            'totalPembayaran' => Pembayaran::sum('total'),
            'transaksiTerbaru' => Faktur::with('pelanggan')->latest()->limit(5)->get(),
        ]);
    }
}
