<?php

use App\Http\Controllers\LoteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProyectoController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return redirect()->route('proyecto_listar');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/proyectos/create', [ProyectoController::class, 'create'])->name('proyecto_crear');
    Route::post('/proyectos/store', [ProyectoController::class, 'store'])->name('proyecto_store');
    Route::get('/proyectos/show/{proyecto}', [ProyectoController::class, 'show'])->name('proyecto_show');
    Route::get('/proyectos/edit/{proyecto}', [ProyectoController::class, 'edit'])->name('proyecto_edit');
    Route::post('/proyectos/update/{proyecto}', [ProyectoController::class, 'update'])->name('proyecto_update');
    Route::get('/proyectos/destroy/{proyecto}', [ProyectoController::class, 'destroy'])->name('proyecto_eliminar');
    Route::get('/lotes/index/{proyecto}', [LoteController::class, 'index'])->name('lote_index');
    Route::get('/lotes/create/{proyecto}', [LoteController::class, 'create'])->name('lote_crear');
    Route::post('/lotes/store/{proyecto}', [LoteController::class, 'store'])->name('lote_store');
    Route::get('/lotes/edit/{lote}', [LoteController::class, 'edit'])->name('lote_edit');
    Route::post('/lotes/update/{lote}', [LoteController::class, 'update'])->name('lote_update');

    /*
    |--------------------------------------------------------------------------
    | Gestión de Proyectos (Nueva funcionalidad)
    |--------------------------------------------------------------------------
    */
    Route::get('/proyectos', [ProyectoController::class, 'index'])->name('proyecto_listar');

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

require __DIR__ . '/auth.php';
