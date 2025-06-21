<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/venta/venta', function () {
        return view('venta.listar');
    })->name('listar_venta');

    /*
    |--------------------------------------------------------------------------
    | Gestión de Clientes
    |--------------------------------------------------------------------------
    */
    Route::get('/clientes', function () {
        return view('clientes.gestionar');
    })->name('gestionar_clientes');

    /*
    |--------------------------------------------------------------------------
    | Gestión de Reservas
    |--------------------------------------------------------------------------
    */
    Route::get('/reservas', function () {
        return view('reservas.gestionar');
    })->name('gestionar_reservas');

    /*
    |--------------------------------------------------------------------------
    | Registro de Ventas
    |--------------------------------------------------------------------------
    */
    Route::get('/ventas', function () {
        return view('ventas.registro');
    })->name('registro_ventas');

    /*
    |--------------------------------------------------------------------------
    | Gestión de Pagos
    |--------------------------------------------------------------------------
    */
    Route::get('/pagos', function () {
        return view('pagos.gestionar');
    })->name('gestionar_pagos');

    /*
    |--------------------------------------------------------------------------
    | Gestión de Usuarios
    |--------------------------------------------------------------------------
    */
    Route::get('/usuarios', function () {
        return view('usuarios.gestionar');
})->name('gestionar_usuarios');

    /*
    |--------------------------------------------------------------------------
    | Informes
    |--------------------------------------------------------------------------
    */
    Route::get('/informes', function () {
        return view('informes.panel');
    })->name('panel_informes');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
