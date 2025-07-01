<?php

use App\Http\Controllers\LoteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\RegistroVisitaController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return redirect()->route('proyecto_listar');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Gestión de Proyectos
    |--------------------------------------------------------------------------
    */
    Route::get('/proyectos', [ProyectoController::class, 'index'])->name('proyecto_listar');
    Route::get('/proyectos/create', [ProyectoController::class, 'create'])->name('proyecto_crear');
    Route::post('/proyectos/store', [ProyectoController::class, 'store'])->name('proyecto_store');
    Route::get('/proyectos/show/{proyecto}', [ProyectoController::class, 'show'])->name('proyecto_show');
    Route::get('/proyectos/edit/{proyecto}', [ProyectoController::class, 'edit'])->name('proyecto_edit');
    Route::post('/proyectos/update/{proyecto}', [ProyectoController::class, 'update'])->name('proyecto_update');
    Route::get('/proyectos/destroy/{proyecto}', [ProyectoController::class, 'destroy'])->name('proyecto_eliminar');

    /*
    |--------------------------------------------------------------------------
    | Gestión de Lotes
    |--------------------------------------------------------------------------
    */
    Route::get('/lotes/index/{proyecto}', [LoteController::class, 'index'])->name('lote_index');
    Route::get('/lotes/create/{proyecto}', [LoteController::class, 'create'])->name('lote_crear');
    Route::post('/lotes/store/{proyecto}', [LoteController::class, 'store'])->name('lote_store');
    Route::get('/lotes/edit/{lote}', [LoteController::class, 'edit'])->name('lote_edit');
    Route::post('/lotes/update/{lote}', [LoteController::class, 'update'])->name('lote_update');

    /*
    |--------------------------------------------------------------------------
    | Gestión de Clientes
    |--------------------------------------------------------------------------
    */
    Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
    Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
    Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');
    Route::get('/clientes/{cliente}', [ClienteController::class, 'show'])->name('clientes.show');
    Route::get('/clientes/{cliente}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');
    Route::put('/clientes/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
    Route::delete('/clientes/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');

    Route::get('/clientes/search', [ClienteController::class, 'search'])->name('clientes.search');
    Route::get('/clientes/export', [ClienteController::class, 'export'])->name('clientes.export');

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
    | Gestión de Visitas
    |--------------------------------------------------------------------------
    */


    Route::get('/visitas', [RegistroVisitaController::class, 'index'])->name('visitas.index');
    Route::get('/visitas/{visita}', [RegistroVisitaController::class, 'destroy'])->name('visitas.destroy');
    Route::post('/visitas/store', [RegistroVisitaController::class, 'store'])->name('visitas.store');

    /*
    |--------------------------------------------------------------------------
    | Gestión de Usuarios
    |--------------------------------------------------------------------------
    */


    Route::resource('usuarios', UsuarioController::class);


    /*
    |--------------------------------------------------------------------------
    | Informes
    |--------------------------------------------------------------------------
    */
    Route::get('/informes', function () {
        return view('informes.panel');
    })->name('panel_informes');

    /*
    |--------------------------------------------------------------------------
    | Cajeras
    |--------------------------------------------------------------------------
    */
    Route::get('/cajeras', function () {
        return view('cajera.index');
    })->name('gestionar_cajeras');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
