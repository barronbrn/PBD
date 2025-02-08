<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\FakturController;
use App\Http\Controllers\ApotekerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\FakturObatController;
use App\Http\Controllers\PembayaranController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


// CRUD Routes
Route::resource('obat', ObatController::class);
Route::resource('pelanggan', PelangganController::class);
Route::resource('faktur', FakturController::class);
// Route::resource('apotek', ApotekerController::class);
Route::resource('pembayaran', PembayaranController::class);
Route::resource('faktur_obat', FakturObatController::class);
