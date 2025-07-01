@extends('base.base')
@section('content')
    <div class="container-fluid">
        <!-- Header Section -->
        <div class="row mt-4 mb-4">
            <div class="col-12">
                <!-- Header Section con mejor espaciado -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h1 class="h2 mb-2 text-dark fw-bold">
                            Gestión de proyectos
                        </h1>
                        <p class="text-muted mb-0 fs-6">Administra y supervisa todos tus proyectos</p>
                    </div>
                    <div>
                        <a href="{{ route('proyecto_crear') }}" class="btn btn-primary btn-lg px-4 py-2">
                            <span class="fw-bold">+ Nuevo proyecto</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Card -->
        <div class="row mb-4">
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card border-primary h-100">
                    <div class="card-body text-center py-4">
                        <div class="text-primary mb-2">
                            <span style="font-size: 2.5rem;">📊</span>
                        </div>
                        <h5 class="card-title text-primary mb-1">Total Proyectos</h5>
                        <h2 class="text-dark fw-bold mb-0">{{ count($proyectos) }}</h2>
                    </div>
                </div>
            </div>

            <!-- Tarjetas adicionales para llenar el espacio -->
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card border-success h-100">
                    <div class="card-body text-center py-4">
                        <div class="text-success mb-2">
                            <span style="font-size: 2.5rem;">🌱</span>
                        </div>
                        <h5 class="card-title text-success mb-1">Áreas Verdes</h5>
                        <h2 class="text-dark fw-bold mb-0">
                            {{ $proyectos->sum('areas_verdes') ?? 0 }}
                        </h2>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card border-info h-100">
                    <div class="card-body text-center py-4">
                        <div class="text-info mb-2">
                            <span style="font-size: 2.5rem;">📈</span>
                        </div>
                        <h5 class="card-title text-info mb-1">En Progreso</h5>
                        <h2 class="text-dark fw-bold mb-0">
                            {{ count($proyectos->where('fecha_creacion', '>=', now()->subDays(30))) }}
                        </h2>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card border-warning h-100">
                    <div class="card-body text-center py-4">
                        <div class="text-warning mb-2">
                            <span style="font-size: 2.5rem;">🏗️</span>
                        </div>
                        <h5 class="card-title text-warning mb-1">Total Unidades</h5>
                        <h2 class="text-dark fw-bold mb-0">
                            {{ $proyectos->sum('cantidad') ?? 0 }}
                        </h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Card -->
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">
                    Lista de Proyectos
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                        <tr class="text-center">
                            <th>
                                Cantidad
                            </th>
                            <th>
                                Foto del Plano
                            </th>
                            <th>
                                Fecha de Creación
                            </th>
                            <th>
                                Áreas Verdes
                            </th>
                            <th>
                                Nombre
                            </th>
                            <th>
                                Descripción
                            </th>
                            <th>
                                Opciones
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($proyectos as $proyecto)
                            <tr class="align-middle">
                                <td class="text-center">
                                    <span class="badge bg-info fs-6">{{ $proyecto->cantidad }}</span>
                                </td>
                                <td>{{ $proyecto->foto_plano }}</td>
                                <td class="text-center">
                                    <small class="text-muted">
                                        {{ date('d/m/Y', strtotime($proyecto->fecha_creacion)) }}
                                    </small>
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-success">
                                        {{ $proyecto->areas_verdes }}
                                    </span>
                                </td>
                                <td>
                                    <strong class="text-primary">{{ $proyecto->nombre }}</strong>
                                </td>
                                <td>
                                    <div title="{{ $proyecto->descripcion }}">
                                        {{ Str::limit($proyecto->descripcion, 50) }}
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="{{route('lote_index', $proyecto )}}" class="btn btn-outline-info"
                                           title="Gestionar">
                                            Gestionar
                                        </a>
                                        <a href="/proyectos/edit/{{$proyecto->id}}" class="btn btn-outline-warning"
                                           title="Editar">
                                            Editar
                                        </a>
                                        <a href="{{route('proyecto_eliminar',$proyecto->id )}}" class="btn btn-outline-danger"
                                            title="Eliminar">
                                            Eliminar
                                        </a>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
