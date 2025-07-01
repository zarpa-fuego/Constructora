<?php

namespace App\Http\Controllers;

use App\Models\Cajera;
use Illuminate\Http\Request;

class CajeraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cajeras = Cajera::all();
        return view('cajera.index', compact('cajeras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cajera.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cajera = new Cajera();
        $cajera -> nombre=$request->get('nombre');
        $cajera -> apellido=$request->get('apellido');
        $cajera -> direccion=$request->get('direccion');
        $cajera -> telefono=$request->get('telefono');
        $cajera -> dni=$request->get('dni');
        $cajera -> fecha_contratacion=$request->get('fecha_contratacion');
        $cajera -> save();
        return redirect()->route('cajera.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cajera $cajera)
    {
        return view('cajera.show', compact('cajera'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cajera $cajera)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cajera $cajera)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cajera $cajera)
    {
        //
    }
}
