<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\FakturController;
use App\Http\Controllers\ApotekerController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\FakturObatController;
use App\Http\Controllers\PembayaranController;


Route::get('/apotek', function () {
    return view('apotek.index');
});

