<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/venta/venta', function () {
    return view('venta.listar');
})->name('listar_venta');

