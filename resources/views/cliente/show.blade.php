@extends('base.base')

@section('content')
<main class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">
                            <i class="fas fa-user"></i> Detalle del Cliente
                        </h5>
                        <div class="btn-group">
                            <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <a href="{{ route('clientes.index') }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-arrow-left"></i> Volver
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            {{-- Información Personal --}}
                            <div class="col-md-6">
                                <div class="card h-100">
                                    <div class="card-header bg-primary text-white">
                                        <h6 class="mb-0">
                                            <i class="fas fa-user"></i> Información Personal
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-borderless">
                                            <tr>
                                                <td class="fw-bold text-muted">Nombre:</td>
                                                <td>{{ $cliente->nombre }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold text-muted">Apellido:</td>
                                                <td>{{ $cliente->apellido }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold text-muted">Nombre Completo:</td>
                                                <td><strong>{{ $cliente->nombre }} {{ $cliente->apellido }}</strong></td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold text-muted">DNI:</td>
                                                <td>
                                                    <span class="badge bg-secondary fs-6">{{ $cliente->dni_numero }}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold text-muted">Estado Civil:</td>
                                                <td>
                                                    <span class="badge bg-info fs-6">{{ $cliente->estado_civil }}</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            {{-- Información de Contacto --}}
                            <div class="col-md-6">
                                <div class="card h-100">
                                    <div class="card-header bg-success text-white">
                                        <h6 class="mb-0">
                                            <i class="fas fa-phone"></i> Información de Contacto
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-borderless">
                                            <tr>
                                                <td class="fw-bold text-muted">Email:</td>
                                                <td>
                                                    <a href="mailto:{{ $cliente->email }}" class="text-decoration-none">
                                                        <i class="fas fa-envelope"></i> {{ $cliente->email }}
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold text-muted">Teléfono:</td>
                                                <td>
                                                    <a href="tel:{{ $cliente->telefono }}" class="text-decoration-none">
                                                        <i class="fas fa-phone"></i> {{ $cliente->telefono }}
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold text-muted">Dirección:</td>
                                                <td>{{ $cliente->direccion }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Información de Ubicación --}}
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header bg-warning text-dark">
                                        <h6 class="mb-0">
                                            <i class="fas fa-map-marker-alt"></i> Ubicación
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="text-center">
                                                    <h6 class="text-muted">Departamento</h6>
                                                    <h5 class="text-primary">
                                                        {{ $cliente->distrito->provincia->departamento->nombre }}
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="text-center">
                                                    <h6 class="text-muted">Provincia</h6>
                                                    <h5 class="text-success">
                                                        {{ $cliente->distrito->provincia->nombre }}
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="text-center">
                                                    <h6 class="text-muted">Distrito</h6>
                                                    <h5 class="text-warning">
                                                        {{ $cliente->distrito->nombre }}
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="row">
                                            <div class="col-12">
                                                <h6 class="text-muted">Dirección Completa:</h6>
                                                <p class="fs-5">
                                                    <i class="fas fa-map-marker-alt text-danger"></i>
                                                    {{ $cliente->direccion }}, {{ $cliente->distrito->nombre }},
                                                    {{ $cliente->distrito->provincia->nombre }},
                                                    {{ $cliente->distrito->provincia->departamento->nombre }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Información de Registro --}}
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header bg-dark text-white">
                                        <h6 class="mb-0">
                                            <i class="fas fa-clock"></i> Información de Registro
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <td class="fw-bold text-muted">Fecha de Registro:</td>
                                                        <td>{{ $cliente->created_at->format('d/m/Y H:i:s') }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-bold text-muted">Hace:</td>
                                                        <td>{{ $cliente->created_at->diffForHumans() }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-md-6">
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <td class="fw-bold text-muted">Última Actualización:</td>
                                                        <td>{{ $cliente->updated_at->format('d/m/Y H:i:s') }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-bold text-muted">Hace:</td>
                                                        <td>{{ $cliente->updated_at->diffForHumans() }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Acciones adicionales --}}
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header bg-info text-white">
                                        <h6 class="mb-0">
                                            <i class="fas fa-cogs"></i> Acciones
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="btn-group me-2">
                                            <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-warning">
                                                <i class="fas fa-edit"></i> Editar Cliente
                                            </a>
                                        </div>

                                        <div class="btn-group me-2">
                                            <form method="POST" action="{{ route('clientes.destroy', $cliente) }}"
                                                  style="display: inline;"
                                                  onsubmit="return confirm('¿Está seguro de eliminar este cliente?\n\nEsta acción no se puede deshacer.')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-trash"></i> Eliminar Cliente
                                                </button>
                                            </form>
                                        </div>

                                        <div class="btn-group">
                                            <a href="{{ route('clientes.index') }}" class="btn btn-secondary">
                                                <i class="fas fa-arrow-left"></i> Volver al Listado
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
