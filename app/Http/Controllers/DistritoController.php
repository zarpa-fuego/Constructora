<?php

namespace App\Http\Controllers;

use App\Models\Distrito;
use Illuminate\Http\Request;

class DistritoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $distritos = Distrito::all();
        return view('distrito.index', compact('distritos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('distrito.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $distrito = new Distrito();
        $distrito -> nombre=$request->get('nombre');
        $distrito->save();
        return redirect()->route('distrito.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Distrito $distrito)
    {
        return view('distrito.show', compact('distrito'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Distrito $distrito)
    {
        return view('distrito.edit', compact('distrito'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Distrito $distrito)
    {
        $distrito -> nombre=$request->get('nombre');
        $distrito->save();
        return redirect()->route('distrito.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Distrito $distrito)
    {
        $distrito->delete();
        return redirect()->route('distrito.index');
    }
}
