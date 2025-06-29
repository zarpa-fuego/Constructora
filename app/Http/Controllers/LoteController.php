<?php

namespace App\Http\Controllers;

use App\Models\Lote;
use App\Models\Proyecto;
use Illuminate\Http\Request;

class LoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Proyecto $proyecto)
    {
        $lotes = Lote::where('proyecto_id', $proyecto->id)->get();

        return view('lote.index', compact('lotes', 'proyecto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Proyecto $proyecto)
    {

        return view('lote.create', compact('proyecto'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Proyecto $proyecto)
    {

        $lote = new Lote();
        $lote->precio = $request->get('precio');
        $lote->limite_sur = $request->get('limite_sur');
        $lote->limite_norte = $request->get('limite_norte');
        $lote->limite_este = $request->get('limite_este');
        $lote->limite_oeste = $request->get('limite_oeste');
        $lote->proyecto_id = $proyecto->id;
        $lote->manzana = $request->get('manzana');
        $lote->sector = $request->get('sector');
        $lote->nro_lote = $request->get('nro_lote');
        $lote->estado = "DISPONIBLE";
        $lote->perimetro = $request->get('perimetro');
        $lote->area = $request->get('area');
        $lote->save();
        return redirect()->route('lote_index', $proyecto->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Lote $lote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lote $lote)
    {
        return view('lote.edit', compact('lote', ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lote $lote)
    {
        $lote->precio = $request->get('precio');
        $lote->limite_sur = $request->get('limite_sur');
        $lote->limite_norte = $request->get('limite_norte');
        $lote->limite_este = $request->get('limite_este');
        $lote->limite_oeste = $request->get('limite_oeste');
        $lote->manzana = $request->get('manzana');
        $lote->sector = $request->get('sector');
        $lote->nro_lote = $request->get('nro_lote');
        $lote->perimetro = $request->get('perimetro');
        $lote->area = $request->get('area');
        $lote->save();
        return redirect()->route('lote_index', $lote->proyecto_id);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lote $lote)
    {
        //
    }
}
