<<<<<<< HEAD
@extends('base.base')

@section('content')
    <div class="container-fluid p-4">

        <!-- Header con breadcrumb -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="h2 text-dark fw-bold mb-1">
                            🏡 Gestión de Lotes
                        </h1>
                        <p class="text-muted mb-0">
                            Administra los lotes del proyecto: <strong class="text-primary">{{ $proyecto->nombre }}</strong>
                        </p>
                    </div>
                    <div class="btn-group">
                        <a href="{{ route('proyecto_listar') }}" class="btn btn-outline-secondary">
                            ← Volver a Proyectos
                        </a>
                        <a href="{{ route('lote_crear', $proyecto->id) }}" class="btn btn-primary">
                            + Agregar Lote
                        </a>
                    </div>
                </div>
            </div>
=======
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
>>>>>>> c9fd628b3ff62f2610b393ab1417eb8cd8f12007
        </div>

        <!-- Stats de Lotes -->
        <div class="row mb-4">
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card border-primary h-100">
                    <div class="card-body text-center py-4">
                        <div class="text-primary mb-2">
                            <span style="font-size: 2.5rem;">🏠</span>
                        </div>
                        <h5 class="card-title text-primary mb-1">Total Lotes</h5>
                        <h2 class="text-dark fw-bold mb-0">{{ count($lotes) }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card border-success h-100">
                    <div class="card-body text-center py-4">
                        <div class="text-success mb-2">
                            <span style="font-size: 2.5rem;">✅</span>
                        </div>
                        <h5 class="card-title text-success mb-1">Disponibles</h5>
                        <h2 class="text-dark fw-bold mb-0">
                            {{ count($lotes->where('estado', 'Disponible')) }}
                        </h2>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card border-warning h-100">
                    <div class="card-body text-center py-4">
                        <div class="text-warning mb-2">
                            <span style="font-size: 2.5rem;">💰</span>
                        </div>
                        <h5 class="card-title text-warning mb-1">Vendidos</h5>
                        <h2 class="text-dark fw-bold mb-0">
                            {{ count($lotes->where('estado', 'Vendido')) }}
                        </h2>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card border-info h-100">
                    <div class="card-body text-center py-4">
                        <div class="text-info mb-2">
                            <span style="font-size: 2.5rem;">📏</span>
                        </div>
                        <h5 class="card-title text-info mb-1">Área Total</h5>
                        <h2 class="text-dark fw-bold mb-0">
                            {{ number_format($lotes->sum('area'), 0) }}
                        </h2>
                        <small class="text-muted">m²</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Información del Proyecto Resaltada -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card border-primary bg-primary bg-opacity-10">
                    <div class="card-header bg-primary text-white">
                        <h6 class="mb-0 fw-bold">
                            📋 Información del Proyecto
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="badge bg-primary me-2">📋</span>
                                    <div>
                                        <small class="text-muted">Proyecto:</small><br>
                                        <strong class="text-primary fs-5">{{ $proyecto->nombre }}</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="badge bg-info me-2">📅</span>
                                    <div>
                                        <small class="text-muted">Fecha Creación:</small><br>
                                        <strong>{{ date('d/m/Y', strtotime($proyecto->fecha_creacion)) }}</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="badge bg-warning me-2">🏠</span>
                                    <div>
                                        <small class="text-muted">Unidades:</small><br>
                                        <strong>{{ $proyecto->cantidad }}</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="badge bg-success me-2">🌱</span>
                                    <div>
                                        <small class="text-muted">Áreas Verdes:</small><br>
                                        <strong>{{ $proyecto->areas_verdes }} m²</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="d-flex align-items-center">
                                    <span class="badge bg-secondary me-2">📝</span>
                                    <div>
                                        <small class="text-muted">Descripción:</small><br>
                                        <span class="text-dark">{{ $proyecto->descripcion }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabla Principal -->
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white py-3">
                        <h5 class="mb-0 fw-bold">
                            📋 Lista de Lotes
                        </h5>
                    </div>

                    <div class="card-body p-0">
                        @if(count($lotes) > 0)
                            <div class="table-responsive">
                                <table class="table table-striped table-hover mb-0">
                                    <thead class="table-dark">
                                    <tr class="text-center">
                                        <th class="py-3">💰 Precio</th>
                                        <th class="py-3">📍 Límites</th>
                                        <th class="py-3">🏘️ Ubicación</th>
                                        <th class="py-3">📊 Medidas</th>
                                        <th class="py-3">📝 Estado</th>
                                        <th class="py-3">📅 Fecha Venta</th>
                                        <th class="py-3">⚙️ Opciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($lotes as $lote)
                                        <tr class="align-middle">
                                            <td class="text-center py-3">
                                                <span class="fw-bold text-success fs-6">
                                                    ${{ number_format($lote->precio, 2) }}
                                                </span>
                                            </td>
                                            <td class="py-3">
                                                <div class="small">
                                                    <div><strong>Norte:</strong> {{ $lote->limite_norte }}</div>
                                                    <div><strong>Sur:</strong> {{ $lote->limite_sur }}</div>
                                                    <div><strong>Este:</strong> {{ $lote->limite_este }}</div>
                                                    <div><strong>Oeste:</strong> {{ $lote->limite_oeste }}</div>
                                                </div>
                                            </td>
                                            <td class="py-3">
                                                <div>
                                                    <div><strong>Proyecto:</strong> {{ $lote->proyecto->nombre }}</div>
                                                    <div><strong>Manzana:</strong> {{ $lote->manzana }}</div>
                                                    <div><strong>Sector:</strong> {{ $lote->sector }}</div>
                                                    <div><strong>Lote N°:</strong>
                                                        <span class="badge bg-info">{{ $lote->nro_lote }}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center py-3">
                                                <div>
                                                    <div class="mb-1">
                                                        <span class="badge bg-secondary">
                                                            📏 {{ $lote->perimetro }} m
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <span class="badge bg-primary">
                                                            📐 {{ $lote->area }} m²
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center py-3">
                                                @if($lote->estado == 'Disponible')
                                                    <span class="badge bg-success fs-6 px-3 py-2">
                                                        ✅ {{ $lote->estado }}
                                                    </span>
                                                @elseif($lote->estado == 'Vendido')
                                                    <span class="badge bg-warning fs-6 px-3 py-2">
                                                        💰 {{ $lote->estado }}
                                                    </span>
                                                @elseif($lote->estado == 'Reservado')
                                                    <span class="badge bg-info fs-6 px-3 py-2">
                                                        🔒 {{ $lote->estado }}
                                                    </span>
                                                @else
                                                    <span class="badge bg-secondary fs-6 px-3 py-2">
                                                        {{ $lote->estado }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="text-center py-3">
                                                @if($lote->fecha_vendido)
                                                    <small class="text-muted">
                                                        📅 {{ date('d/m/Y', strtotime($lote->fecha_vendido)) }}
                                                    </small>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                            <td class="text-center py-3">
                                                <div class="btn-group btn-group-sm" role="group">
                                                    <a href="/lotes/show/{{ $lote->id }}"
                                                       class="btn btn-outline-info px-3"
                                                       title="Ver detalles">
                                                        Ver
                                                    </a>
                                                    <a href="/lotes/edit/{{ $lote->id }}"
                                                       class="btn btn-outline-warning px-3"
                                                       title="Editar lote">
                                                        Editar
                                                    </a>
                                                    <a href="/lotes/destroy/{{ $lote->id }}"
                                                       class="btn btn-outline-danger px-3"
                                                       title="Eliminar lote"
                                                       onclick="return confirm('¿Estás seguro de eliminar el lote {{ $lote->nro_lote }}?')">
                                                        Eliminar
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center py-5">
                                <div class="mb-4">
                                    <span style="font-size: 4rem;">🏡</span>
                                </div>
                                <h4 class="text-muted">No hay lotes registrados</h4>
                                <p class="text-muted">Comience agregando el primer lote al proyecto</p>
                                <a href="{{ route('lote_crear', $proyecto->id) }}" class="btn btn-primary">
                                    + Agregar Primer Lote
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- Espaciado inferior -->
        <div class="mb-5"></div>
    </div>
<<<<<<< HEAD

=======
</main>
>>>>>>> c9fd628b3ff62f2610b393ab1417eb8cd8f12007
@endsection
