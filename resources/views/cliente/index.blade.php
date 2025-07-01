@extends('base.base')

@section('content')
<main class="content">
    <div class="container-fluid">
      {{-- Métricas rápidas --}}
<div class="row mb-4">
    <div class="col-md-4 mb-2">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body py-3">
                <div class="d-flex align-items-center mb-2">
                    <span class="fw-bold fs-6">Total Clientes</span>
                    <span class="ms-auto">
                        <i class="fas fa-users fa-2x" style="color: #0a00cd;"></i>
                    </span>
                </div>
                <div class="fw-bold fs-3">{{ $totalClientes ?? 0 }}</div>
                <div class="text-muted" style="font-size: 0.9rem;">+{{ $clientesUltimoMes ?? 0 }} en el último mes</div>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-2">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body py-3">
                <div class="d-flex align-items-center mb-2">
                    <span class="fw-bold fs-6">Clientes Activos</span>
                    <span class="ms-auto">
                        <i class="fas fa-user-check fa-2x" style="color: #0a00cd;"></i>
                    </span>
                </div>
                <div class="fw-bold fs-3">{{ $clientesActivos ?? 0 }}</div>
                <div class="text-muted" style="font-size: 0.9rem;">{{ $porcentajeActivos ?? 0 }}% del total</div>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-2">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body py-3">
                <div class="d-flex align-items-center mb-2">
                    <span class="fw-bold fs-6">Interesados Recientes</span>
                    <span class="ms-auto">
                        <i class="fas fa-user-clock fa-2x" style="color: #0a00cd;"></i>
                    </span>
                </div>
                <div class="fw-bold fs-3">{{ $interesadosRecientes ?? 0 }}</div>
                <div class="text-muted" style="font-size: 0.9rem;">Últimos 7 días</div>
            </div>
        </div>
    </div>
</div>

        <div class="row">
            {{-- Sidebar de filtros --}}
            <div class="col-md-3 mb-3">
                <div class="card">
                    <div class="card-header bg-white">
                        <strong>Filtros</strong>
                    </div>
                    <div class="card-body">
                        <form method="GET" action="{{ route('clientes.index') }}">
                            <div class="mb-3">
                                <input type="text" name="search" class="form-control" placeholder="Nombre, email o teléfono" value="{{ request('search') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Estado Civil</label>
                                <select name="estado_civil" class="form-select">
                                    <option value="">Todos</option>
                                    <option value="Soltero" {{ request('estado_civil') == 'Soltero' ? 'selected' : '' }}>Soltero</option>
                                    <option value="Casado" {{ request('estado_civil') == 'Casado' ? 'selected' : '' }}>Casado</option>
                                    <option value="Divorciado" {{ request('estado_civil') == 'Divorciado' ? 'selected' : '' }}>Divorciado</option>
                                    <option value="Viudo" {{ request('estado_civil') == 'Viudo' ? 'selected' : '' }}>Viudo</option>
                                    <option value="Conviviente" {{ request('estado_civil') == 'Conviviente' ? 'selected' : '' }}>Conviviente</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Departamento</label>
                                <input type="text" name="departamento_id" class="form-control" placeholder="ID Departamento" value="{{ request('departamento_id') }}">
                            </div>
                            <button class="btn btn-primary w-100" type="submit">
                                <i class="fas fa-filter"></i> Aplicar Filtros
                            </button>
                            <a href="{{ route('clientes.index') }}" class="btn btn-secondary w-100 mt-2">
                                <i class="fas fa-times"></i> Limpiar
                            </a>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Contenido principal --}}
            <div class="col-md-9">
                <div class="card shadow-sm">
                    <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white rounded-top">
                        <h5 class="mb-0">
                            <i class="fas fa-users"></i> Gestión de Clientes
                        </h5>
                        <div class="d-flex gap-2">
                            <a href="{{ route('clientes.export.pdf') }}" class="btn btn-danger">
                                <i class="fas fa-file-pdf"></i> Exportar PDF
                            </a>
                            <a href="{{ route('clientes.create') }}" class="btn btn-light">
                                <i class="fas fa-plus"></i> Nuevo Cliente
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        {{-- Mensajes --}}
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
                                <table class="table table-hover align-middle">
                                    <thead class="table-primary">
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Nombre Completo</th>
                                        <th>DNI</th>
                                        <th>Email</th>
                                        <th>Teléfono</th>
                                        <th>Ubicación</th>
                                        <th>Estado Civil</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($clientes as $cliente)
                                        <tr>
                                 <td class="text-center">
    <span class="badge bg-secondary fs-6">
        {{ $clientes->firstItem() + $loop->index }}
    </span>
</td>
                                            <td>
                                                <span class="fw-bold text-capitalize">
                                                    <i class="fas fa-user text-primary"></i>
                                                    {{ $cliente->nombre }} {{ $cliente->apellido }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge bg-dark fs-6">
                                                    <i class="fas fa-id-card"></i> {{ $cliente->dni_numero }}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="mailto:{{ $cliente->email }}" class="text-decoration-none">
                                                    <i class="fas fa-envelope text-info"></i>
                                                    <span class="text-lowercase">{{ $cliente->email }}</span>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="tel:{{ $cliente->telefono }}" class="text-decoration-none">
                                                    <i class="fas fa-phone text-success"></i>
                                                    {{ $cliente->telefono }}
                                                </a>
                                            </td>
                                            <td>
                                                <small class="text-muted">
                                                    <i class="fas fa-map-marker-alt"></i>
                                                    {{ $cliente->distrito->nombre }},
                                                    {{ $cliente->distrito->provincia->nombre }},
                                                    {{ $cliente->distrito->provincia->departamento->nombre }}
                                                </small>
                                            </td>
                                            <td>
                                                @php
                                                    $estadoColor = [
                                                        'Soltero' => 'primary',
                                                        'Casado' => 'success',
                                                        'Divorciado' => 'danger',
                                                        'Viudo' => 'dark',
                                                        'Conviviente' => 'info',
                                                        'Casada' => 'success'
                                                    ][$cliente->estado_civil] ?? 'secondary';
                                                @endphp
                                                <span class="badge bg-{{ $estadoColor }} text-white">
                                                    {{ $cliente->estado_civil }}
                                                </span>
                                            </td>


   <td class="text-center">
    <div class="btn-group btn-group-sm" role="group">
        <a href="{{ route('clientes.show', $cliente) }}" class="btn btn-outline-info"
           data-bs-toggle="tooltip" title="Ver detalles">
            <i class="bi bi-ticket-detailed"></i>
        </a>
        <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-outline-warning"
           data-bs-toggle="tooltip" title="Editar">
            <i class="bi bi-pencil-square"></i>
        </a>
        <form method="POST" action="{{ route('clientes.destroy', $cliente) }}"
              style="display:inline;"
              onsubmit="return confirm('¿Está seguro de eliminar este cliente?')">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="btn btn-outline-danger"
                    data-bs-toggle="tooltip"
                    title="Eliminar">
                <i class="bi bi-trash3-fill"></i>
            </button>
        </form>
    </div>
</td>

                                    @endforeach
                                    </tbody>
                                </table>
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
{{-- Tooltips Bootstrap 5 --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        tooltipTriggerList.forEach(function (tooltipTriggerEl) {
            new bootstrap.Tooltip(tooltipTriggerEl)
        })
    });
</script>
@endsection
