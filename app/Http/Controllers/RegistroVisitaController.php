<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\RegistroVisita;
use Illuminate\Http\Request;

class RegistroVisitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $usuario = Auth::user();
        $registroVisitas = RegistroVisita::where('user_id', $usuario->id)->get();

        return view('visita.index', compact('registroVisitas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'nullable',
            'cliente' => 'nullable|max:150',
            'observacion' => 'nullable|max:150',
        ]);

        RegistroVisita::create([
            'user_id' => auth()->id(),
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'cliente' => $request->cliente,
            'observacion' => $request->observacion,
        ]);

        return redirect()->route('visitas.index')
            ->with('success', 'Visita registrada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(RegistroVisita $registroVisita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RegistroVisita $registroVisita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RegistroVisita $registroVisita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RegistroVisita $visita)
    {
        $visita->delete();
        return redirect()->route('visitas.index');
    }
}
