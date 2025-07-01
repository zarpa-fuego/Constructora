@extends('base.base')

@section('content')
    <main class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">
                                <i class="fas fa-users"></i> Gestión de Clientes
                            </h5>
                            <a href="{{ route('clientes.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Nuevo Cliente
                            </a>
                        </div>

                        <div class="card-body">
                            {{-- Mostrar mensajes de éxito o error --}}
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            @if(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="fas fa-exclamation-triangle"></i> {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            {{-- Tabla de clientes --}}
                            @if($clientes->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead class="table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre Completo</th>
                                            <th>DNI</th>
                                            <th>Email</th>
                                            <th>Teléfono</th>
                                            <th>Ubicación</th>
                                            <th>Estado Civil</th>
                                            <th>Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($clientes as $cliente)
                                            <tr>
                                                <td>{{ $cliente->id }}</td>
                                                <td>
                                                    <strong>{{ $cliente->nombre }} {{ $cliente->apellido }}</strong>
                                                </td>
                                                <td>
                                                    <span class="badge bg-secondary">{{ $cliente->dni_numero }}</span>
                                                </td>
                                                <td>
                                                    <a href="mailto:{{ $cliente->email }}" class="text-decoration-none">
                                                        <i class="fas fa-envelope"></i> {{ $cliente->email }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="tel:{{ $cliente->telefono }}" class="text-decoration-none">
                                                        <i class="fas fa-phone"></i> {{ $cliente->telefono }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <small class="text-muted">
                                                        {{ $cliente->distrito->nombre }}<br>
                                                        {{ $cliente->distrito->provincia->nombre }}<br>
                                                        {{ $cliente->distrito->provincia->departamento->nombre }}
                                                    </small>
                                                </td>
                                                <td>
                                                    <span class="badge bg-info">{{ $cliente->estado_civil }}</span>
                                                </td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ route('clientes.show', $cliente) }}"
                                                           class="btn btn-sm btn-outline-info"
                                                           title="Ver detalles">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="{{ route('clientes.edit', $cliente) }}"
                                                           class="btn btn-sm btn-outline-warning"
                                                           title="Editar">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <form method="POST" action="{{ route('clientes.destroy', $cliente) }}"
                                                              style="display: inline;"
                                                              onsubmit="return confirm('¿Está seguro de eliminar este cliente?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                    class="btn btn-sm btn-outline-danger"
                                                                    title="Eliminar">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                {{-- Paginación --}}
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <div>
                                        <small class="text-muted">
                                            Mostrando {{ $clientes->firstItem() }} a {{ $clientes->lastItem() }}
                                            de {{ $clientes->total() }} resultados
                                        </small>
                                    </div>
                                    <div>
                                        {{ $clientes->links() }}
                                    </div>
                                </div>
                            @else
                                <div class="text-center py-5">
                                    <i class="fas fa-users fa-3x text-muted mb-3"></i>
                                    <h5 class="text-muted">No hay clientes registrados</h5>
                                    <p class="text-muted">Comience agregando su primer cliente</p>
                                    <a href="{{ route('clientes.create') }}" class="btn btn-primary">
                                        <i class="fas fa-plus"></i> Crear Primer Cliente
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
