<?php

use Illuminate\Support\Facades\Route;

Route::get('/apotek', function () {
    return view('apotek.index');
});
