<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proyectos = Proyecto::all();
        return view('proyecto.index', compact('proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proyecto.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $proyecto = new Proyecto();
        $proyecto -> cantidad=$request->get('cantidad');
        $proyecto -> foto_plano=$request->get('foto_plano');
        $proyecto -> fecha_creacion=$request->get('fecha_creacion');
        $proyecto -> areas_verdes= $request->get('areas_verdes');
        $proyecto -> nombre=$request->get('nombre');
        $proyecto -> descripcion=$request->get('descripcion');
        $proyecto->save();
        return redirect()->route('proyecto_listar');

    }

    /**
     * Display the specified resource.
     */
    public function show(Proyecto $proyecto)
    {
        return view('proyecto.show', compact('proyecto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proyecto $proyecto)
    {
        return view('proyecto.edit', compact('proyecto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        $proyecto -> cantidad=$request->get('cantidad');
        $proyecto -> foto_plano=$request->get('foto_plano');
        $proyecto -> fecha_creacion=$request->get('fecha_creacion');
        $proyecto -> areas_verdes= $request->get('areas_verdes');
        $proyecto -> nombre=$request->get('nombre');
        $proyecto -> descripcion=$request->get('descripcion');
        $proyecto->save();
        return redirect()->route('proyecto_listar');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proyecto $proyecto)
    {
        $proyecto->delete();
        return redirect()->route('proyecto_listar');
    }
}
