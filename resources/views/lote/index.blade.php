@extends('base.base') {{-- Tu layout base --}}

@section('content')
<main class="content">
    <div class="card">
        <div class="card-header">
            Gestión de Clientes
            <a href="{{ route('clientes.create') }}" class="btn btn-primary btn-sm float-end">
                Crear Nuevo Cliente
            </a>
        </div>
        <div class="card-body">
            {{-- Mostrar mensajes de éxito --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- Mostrar mensajes de error --}}
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if ($clientes->isEmpty())
                <div class="alert alert-info">
                    No hay clientes registrados.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre Completo</th>
                                <th>DNI</th>
                                <th>Email</th>
                                <th>Teléfono</th>
                                <th>Distrito</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->id }}</td>
                                <td>{{ $cliente->nombre }} {{ $cliente->apellido }}</td>
                                <td>{{ $cliente->dni_numero }}</td>
                                <td>{{ $cliente->email }}</td>
                                <td>{{ $cliente->telefono }}</td>
                                <td>{{ $cliente->distrito->nombre ?? 'N/A' }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('clientes.show', $cliente->id) }}"
                                           class="btn btn-info btn-sm" title="Ver detalles">
                                            Ver
                                        </a>
                                        <a href="{{ route('clientes.edit', $cliente->id) }}"
                                           class="btn btn-warning btn-sm" title="Editar cliente">
                                            Editar
                                        </a>
                                        <form action="{{ route('clientes.destroy', $cliente->id) }}"
                                              method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                    title="Eliminar cliente"
                                                    onclick="return confirm('¿Estás seguro de querer eliminar este cliente?\n\nCliente: {{ $cliente->nombre }} {{ $cliente->apellido }}\nDNI: {{ $cliente->dni_numero }}\n\nEsta acción es irreversible.')">
                                                Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Enlaces de paginación --}}
                <div class="d-flex justify-content-center">
                    {{ $clientes->links() }}
                </div>
            @endif
        </div>
    </div>
</main>
@endsection
