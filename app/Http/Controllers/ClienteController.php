<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Distrito;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    /**
     * Muestra una lista de clientes con paginación y búsqueda.
     */
    public function index(Request $request)
    {
        $query = Cliente::with('distrito.provincia.departamento');

        // Búsqueda por nombre, apellido, DNI o email
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nombre', 'LIKE', "%{$search}%")
                  ->orWhere('apellido', 'LIKE', "%{$search}%")
                  ->orWhere('dni_numero', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%");
            });
        }

        // Filtro por estado civil
        if ($request->filled('estado_civil')) {
            $query->where('estado_civil', $request->estado_civil);
        }

        // Filtro por departamento
        if ($request->filled('departamento_id')) {
            $query->whereHas('distrito.provincia.departamento', function($q) use ($request) {
                $q->where('id', $request->departamento_id);
            });
        }

        $clientes = $query->orderBy('created_at', 'desc')->paginate(10);

        // Mantener parámetros de búsqueda en la paginación
        $clientes->appends($request->query());

        return view('cliente.index', compact('clientes'));
    }

    /**
     * Muestra el formulario para crear un nuevo cliente.
     */
    public function create()
    {
        $distritos = Distrito::with('provincia.departamento')
            ->orderBy('nombre')
            ->get()
            ->groupBy('provincia.departamento.nombre')
            ->map(function ($distritos) {
                return $distritos->groupBy('provincia.nombre');
            });

        return view('cliente.create', compact('distritos'));
    }

    /**
     * Almacena un cliente recién creado en la base de datos.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate($this->getValidationRules());

        try {
            DB::transaction(function () use ($validatedData) {
                Cliente::create($validatedData);
            });

            return redirect()->route('clientes.index')
                ->with('success', 'Cliente creado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Error al crear el cliente: ' . $e->getMessage());
        }
    }

    /**
     * Muestra el cliente especificado.
     */
    public function show(Cliente $cliente)
    {
        // Cargar las relaciones anidadas para mostrar información completa
        $cliente->load('distrito.provincia.departamento');

        return view('cliente.show', compact('cliente'));
    }

    /**
     * Muestra el formulario para editar el cliente especificado.
     */
    public function edit(Cliente $cliente)
    {
        $distritos = Distrito::with('provincia.departamento')
            ->orderBy('nombre')
            ->get()
            ->groupBy('provincia.departamento.nombre')
            ->map(function ($distritos) {
                return $distritos->groupBy('provincia.nombre');
            });

        return view('cliente.edit', compact('cliente', 'distritos'));
    }

    /**
     * Actualiza el cliente especificado en la base de datos.
     */
    public function update(Request $request, Cliente $cliente)
    {
        $validatedData = $request->validate($this->getValidationRules($cliente));

        try {
            DB::transaction(function () use ($cliente, $validatedData) {
                $cliente->update($validatedData);
            });

            return redirect()->route('clientes.index')
                ->with('success', 'Cliente actualizado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Error al actualizar el cliente: ' . $e->getMessage());
        }
    }

    /**
     * Elimina el cliente especificado de la base de datos.
     */
    public function destroy(Cliente $cliente)
    {
        try {
            DB::transaction(function () use ($cliente) {
                $cliente->delete();
            });

            return redirect()->route('clientes.index')
                ->with('success', 'Cliente eliminado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('clientes.index')
                ->with('error', 'Error al eliminar el cliente: ' . $e->getMessage());
        }
    }

    /**
     * Búsqueda AJAX para autocompletar
     */
    public function search(Request $request)
    {
        $query = $request->get('q');

        $clientes = Cliente::where('nombre', 'LIKE', "%{$query}%")
            ->orWhere('apellido', 'LIKE', "%{$query}%")
            ->orWhere('dni_numero', 'LIKE', "%{$query}%")
            ->limit(10)
            ->get(['id', 'nombre', 'apellido', 'dni_numero']);

        return response()->json($clientes);
    }

    /**
     * Exportar clientes a CSV
     */
    public function export()
    {
        $clientes = Cliente::with('distrito.provincia.departamento')->get();

        $filename = 'clientes_' . date('Y-m-d_H-i-s') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function() use ($clientes) {
            $file = fopen('php://output', 'w');

            // Cabeceras del CSV
            fputcsv($file, [
                'ID', 'Nombre', 'Apellido', 'DNI', 'Email', 'Teléfono',
                'Estado Civil', 'Dirección', 'Distrito', 'Provincia', 'Departamento',
                'Fecha Registro'
            ]);

            // Datos
            foreach ($clientes as $cliente) {
                fputcsv($file, [
                    $cliente->id,
                    $cliente->nombre,
                    $cliente->apellido,
                    $cliente->dni_numero,
                    $cliente->email,
                    $cliente->telefono,
                    $cliente->estado_civil,
                    $cliente->direccion,
                    $cliente->distrito->nombre,
                    $cliente->distrito->provincia->nombre,
                    $cliente->distrito->provincia->departamento->nombre,
                    $cliente->created_at->format('d/m/Y H:i:s')
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Reglas de validación mejoradas
     */
    private function getValidationRules($cliente = null)
    {
        $rules = [
            'estado_civil' => 'required|string|in:Soltero,Casado,Divorciado,Viudo,Conviviente',
            'nombre' => [
                'required',
                'string',
                'max:120',
                'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/'
            ],
            'apellido' => [
                'required',
                'string',
                'max:180',
                'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/'
            ],
            'distrito_id' => 'required|exists:distritos,id',
            'direccion' => 'required|string|max:200',
            'telefono' => [
                'required',
                'string',
                'regex:/^[0-9]{9,11}$/'
            ],
            'email' => 'required|string|email|max:150',
            'dni_numero' => [
                'required',
                'string',
                'regex:/^[0-9]{8}$/'
            ],
        ];

        // Para update, ignorar el registro actual en validaciones unique
        if ($cliente) {
            $rules['email'][] = Rule::unique('clientes', 'email')->ignore($cliente->id);
            $rules['dni_numero'][] = Rule::unique('clientes', 'dni_numero')->ignore($cliente->id);
        } else {
    $rules['email'] = ['unique:clientes,email'];
    $rules['dni_numero'] = ['unique:clientes,dni_numero'];
}

        return $rules;
    }

    /**
     * Mensajes de validación personalizados
     */
    public function messages()
    {
        return [
            'nombre.regex' => 'El nombre solo puede contener letras y espacios.',
            'apellido.regex' => 'El apellido solo puede contener letras y espacios.',
            'telefono.regex' => 'El teléfono debe tener entre 9 y 11 dígitos.',
            'dni_numero.regex' => 'El DNI debe tener exactamente 8 dígitos.',
            'dni_numero.unique' => 'Este DNI ya está registrado.',
            'email.unique' => 'Este email ya está registrado.',
        ];
    }
}
