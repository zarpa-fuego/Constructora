<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Terreno;
use App\Livewire\Forms\SupplierForm;
use App\Models\Cliente;

class RegistrodeVenMain extends Component
{
    use WithPagination;

    public $showSupplierForm = false; // Inicialmente el formulario está visible
    public $selectedTerrenoId = null;
    public SupplierForm $form;

    public $dni, $nombre, $apellido_paterno, $apellido_materno, $correo, $telefono, $direccion, $estado_cliente;

    public $modalAction = 'guardarCliente'; // Puede ser 'guardarCliente' o 'guardarReserva'
    public $modalTitle = 'Registrar Venta para Terreno';

    public function registrarVenta($terrenoId)
    {
        $this->selectedTerrenoId = $terrenoId;
        $this->showSupplierForm = true;
        $this->modalAction = 'guardarCliente';
        $this->modalTitle = 'Registrar Venta para Terreno ' . $terrenoId;
        $this->form->reset(); // Limpia el formulario al abrir el modal
    }

    public function reservarTerreno($terrenoId)
    {
        $this->selectedTerrenoId = $terrenoId;
        $this->showSupplierForm = true;
        $this->modalAction = 'guardarReserva';
        $this->modalTitle = 'Reservar Terreno ' . $terrenoId;
        $this->form->reset(); // Limpia el formulario al abrir el modal
    }

    public function buscarClientePorDNI()
    {
        $cliente = \App\Models\Cliente::where('DNI', $this->dni)->first();
        if ($cliente) {
            $this->nombre = $cliente->Nombre;
            $this->apellido_paterno = $cliente->Apellido_Paterno;
            $this->apellido_materno = $cliente->Apellido_Materno;
            $this->correo = $cliente->Correo;
            $this->telefono = $cliente->Telefono;
            $this->direccion = $cliente->Direccion;
            $this->estado_cliente = $cliente->Estado_Cliente;
            session()->flash('success', 'Cliente encontrado y datos cargados.');
        } else {
            $this->nombre = '';
            $this->apellido_paterno = '';
            $this->apellido_materno = '';
            $this->correo = '';
            $this->telefono = '';
            $this->direccion = '';
            $this->estado_cliente = '';
            session()->flash('info', 'No se encontró cliente con ese DNI. Complete los datos para registrar uno nuevo.');
        }
    }

    public function guardarCliente()
    {
        $this->validate([
            'dni' => 'required',
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'correo' => 'required|email',
            'telefono' => 'required',
            'direccion' => 'required',
            'estado_cliente' => 'required',
        ]);

        $cliente = \App\Models\Cliente::where('DNI', $this->dni)->first();

        if ($cliente) {
            $cliente->update([
                'Nombre' => $this->nombre,
                'Apellido_Paterno' => $this->apellido_paterno,
                'Apellido_Materno' => $this->apellido_materno,
                'Correo' => $this->correo,
                'Telefono' => $this->telefono,
                'Direccion' => $this->direccion,
                'Estado_Cliente' => $this->estado_cliente,
            ]);
        } else {
            \App\Models\Cliente::create([
                'DNI' => $this->dni,
                'Nombre' => $this->nombre,
                'Apellido_Paterno' => $this->apellido_paterno,
                'Apellido_Materno' => $this->apellido_materno,
                'Correo' => $this->correo,
                'Telefono' => $this->telefono,
                'Direccion' => $this->direccion,
                'Estado_Cliente' => $this->estado_cliente,
            ]);
        }

        $terreno = \App\Models\Terreno::find($this->selectedTerrenoId);
        if ($terreno) {
            $terreno->Estado_Terreno = 'Vendido';
            $terreno->save();
        }

        $this->showSupplierForm = false;
        session()->flash('success', 'Venta registrada correctamente.');
    }

    public function guardarSupplier()
    {
        $this->validate();
        $this->showSupplierForm = false;
        session()->flash('success', 'Venta registrada correctamente.');
    }

    public function guardarReserva()
    {
        $terreno = \App\Models\Terreno::find($this->selectedTerrenoId);
        if ($terreno) {
            $terreno->Estado_Terreno = 'Reservado';
            $terreno->save();
        }

        $this->showSupplierForm = false;
        session()->flash('success', 'Terreno reservado correctamente.');
    }

    public function render()
    {
        // Todos los terrenos para el resumen
        $todosTerrenos = \App\Models\Terreno::all();

        // Solo los que quieres mostrar en la tabla
        $terrenos = \App\Models\Terreno::whereIn('Estado_Terreno', ['Disponible', 'Reservado'])
            ->orderByDesc('ID_Terrreno')
            ->paginate(10);

        return view('livewire.registrode-ven-main', [
            'terrenos' => $terrenos,
            'todosTerrenos' => $todosTerrenos,
        ]);
    }
}
