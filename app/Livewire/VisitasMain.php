<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Visita;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class VisitasMain extends Component
{
    public $nombre, $apellido, $telefono, $email, $empresa, $motivo, $fecha, $documento_identidad, $agente_comercial_id;
    public $visitas;
    public $editId = null;

    public function mount()
    {
        $this->fecha = now()->format('Y-m-d\TH:i');
        $this->agente_comercial_id = Auth::id(); // Asigna automáticamente el ID del usuario autenticado
    }



    public function guardarVisita()
    {
        $this->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'motivo' => 'required',
            'fecha' => 'required',
            'agente_comercial_id' => 'required|exists:users,id',
        ]);

        Visita::create([
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'telefono' => $this->telefono,
            'email' => $this->email,
            'empresa' => $this->empresa,
            'motivo' => $this->motivo,
            'fecha' => $this->fecha,
            'documento_identidad' => $this->documento_identidad,
            'agente_comercial_id' => $this->agente_comercial_id,
        ]);

        $this->reset(); // Limpia el formulario
        session()->flash('success', 'Visita registrada correctamente.');
    }

    public function editVisita($id)
    {
        $visita = Visita::findOrFail($id);
        $this->editId = $id;
        $this->nombre = $visita->nombre;
        $this->apellido = $visita->apellido;
        $this->telefono = $visita->telefono;
        $this->email = $visita->email;
        $this->empresa = $visita->empresa;
        $this->motivo = $visita->motivo;
        $this->fecha = date('Y-m-d\TH:i', strtotime($visita->fecha));
        $this->documento_identidad = $visita->documento_identidad;
        $this->agente_comercial_id = $visita->agente_comercial_id;
    }

    public function updateVisita()
    {
        $this->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'motivo' => 'required',
            'fecha' => 'required',
            'agente_comercial_id' => 'required|exists:users,id',
        ]);

        $visita = Visita::findOrFail($this->editId);
        $visita->update([
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'telefono' => $this->telefono,
            'email' => $this->email,
            'empresa' => $this->empresa,
            'motivo' => $this->motivo,
            'fecha' => $this->fecha,
            'documento_identidad' => $this->documento_identidad,
            'agente_comercial_id' => $this->agente_comercial_id,
        ]);

        $this->reset();
        session()->flash('success', 'Visita actualizada correctamente.');
    }

    public function deleteVisita($id)
    {
        Visita::findOrFail($id)->delete();
        session()->flash('success', 'Visita eliminada correctamente.');
    }

    public function render()
    {
        $agentes = User::all();
        $this->visitas = Visita::latest()->get();
        return view('livewire.visitas-main', compact('agentes'));
    }
    public function agenteComercial()
    {
        return $this->belongsTo(\App\Models\User::class, 'agente_comercial_id');
    }
}

