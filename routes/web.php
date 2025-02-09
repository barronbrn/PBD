<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\JenisObatController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// CRUD Routes
Route::resource('obat', ObatController::class);
Route::resource('jenis-obat', JenisObatController::class);
Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index'); // Menampilkan daftar transaksi
Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create'); // Form tambah transaksi
Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store'); // Simpan transaksi baru

Route::get('/transaksi/{noTransaksi}/{kodeObat}/edit', [TransaksiController::class, 'edit'])->name('transaksi.edit'); // Form edit
Route::put('/transaksi/{noTransaksi}/{kodeObat}', [TransaksiController::class, 'update'])->name('transaksi.update'); // Update transaksi

Route::delete('/transaksi/{noTransaksi}/{kodeObat}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');

// Route::delete('/transaksi/{noTransaksi}/{kodeObat}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy'); // Hapus transaksi
