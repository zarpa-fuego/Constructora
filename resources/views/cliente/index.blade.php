@extends('base.base')

@section('content')
<<<<<<< HEAD
    <main class="content">
        <div class="container-fluid p-0">
            <!-- Tarjetas de estadísticas -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <h6 class="mb-2">Total Clientes</h6>
                            <h3>248</h3>
                            <p class="text-muted">+12 en el último mes</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <h6 class="mb-2">Clientes Activos</h6>
                            <h3>187</h3>
                            <p class="text-muted">75% del total</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <h6 class="mb-2">Interesados Recientes</h6>
                            <h3>32</h3>
                            <p class="text-muted">Últimos 7 días</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Filtros -->
                <div class="col-md-3">
                    <div class="card p-3">
                        <h5 class="card-title">Filtros</h5>
                        <input type="text" class="form-control mb-2" placeholder="Nombre, email o teléfono">
                        <select class="form-select mb-2">
                            <option>Todos</option>
                            <option>Interesado</option>
                            <option>Comprador</option>
                        </select>
                        <select class="form-select mb-2">
                            <option>Todos los proyectos</option>
                            <option>Residencial Las Palmas</option>
                            <option>Condominio El Bosque</option>
                        </select>
                        <input type="date" class="form-control mb-2">
                        <input type="date" class="form-control mb-2">
                        <button class="btn btn-primary w-100">Aplicar Filtros</button>
                    </div>
                </div>

                <!-- Lista de clientes -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Listado de Clientes</h5>
                            <div>
                                <button class="btn btn-sm btn-outline-secondary">Exportar</button>
                                <button class="btn btn-sm btn-primary">Nuevo Cliente</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover align-middle">
                                <thead>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Contacto</th>
                                    <th>Estado</th>
                                    <th>Proyecto</th>
                                    <th>Última Actividad</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><strong>Carlos Méndez</strong><br><small>ID: CM-2023-089</small></td>
                                    <td>cmendez@gmail.com<br>+52 55 1234 5678</td>
                                    <td><span class="badge bg-warning text-dark">Comprador</span></td>
                                    <td>Residencial Las Palmas<br><small>Lote B-15</small></td>
                                    <td>15/06/2023<br><small>Pago de mensualidad</small></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">Editar</button>
                                        <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Ana María Gutiérrez</strong><br><small>ID: AG-2023-124</small></td>
                                    <td>anagutierrez@outlook.com<br>+52 55 8765 4321</td>
                                    <td><span class="badge bg-secondary">Interesado</span></td>
                                    <td>Condominio El Bosque<br><small>Sin asignar</small></td>
                                    <td>22/06/2023<br><small>Visita a showroom</small></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">Editar</button>
                                        <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Roberto Sánchez</strong><br><small>ID: RS-2023-056</small></td>
                                    <td>rsanchez@empresa.mx<br>+52 55 2468 1357</td>
                                    <td><span class="badge bg-warning text-dark">Comprador</span></td>
                                    <td>Torres del Valle<br><small>Unidad 302-A</small></td>
                                    <td>10/06/2023<br><small>Firma de contrato</small></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">Editar</button>
                                        <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <nav>
                                <ul class="pagination justify-content-end">
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                </ul>
                            </nav>
                        </div>
=======
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
>>>>>>> c9fd628b3ff62f2610b393ab1417eb8cd8f12007
                    </div>
                </div>
            </div>
        </div>
<<<<<<< HEAD
        <!-- Detalle del Cliente -->
        <div class="row mt-4">
            <div class="col-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-body d-flex">
                        <div class="w-100">
                            <h5 class="card-title mb-3">Detalle del Cliente</h5>
                            <div class="d-flex flex-wrap">
                                <!-- Columna Izquierda: Botones -->
                                <div class="me-4 mb-3" style="min-width: 200px;">
                                    <h6 class="mb-1">Carlos Méndez</h6>
                                    <span class="badge bg-warning text-dark mb-3">Comprador</span>
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-outline-warning">Editar Perfil</button>
                                        <button class="btn btn-outline-dark">Enviar Email</button>
                                    </div>
                                </div>

                                <!-- Información Personal -->
                                <div class="me-4 mb-3" style="min-width: 300px;">
                                    <h6>Información Personal</h6>
                                    <p><strong>Nombre Completo:</strong> Carlos Alberto Méndez Ramírez</p>
                                    <p><strong>Email:</strong> cmendez@gmail.com</p>
                                    <p><strong>Teléfono:</strong> +52 55 1234 5678</p>
                                    <p><strong>Dirección:</strong> Av. Insurgentes Sur 1234, Col. Del Valle, CDMX</p>
                                    <p><strong>Fecha de Nacimiento:</strong> 15/03/1978</p>
                                    <p><strong>Ocupación:</strong> Ingeniero Civil</p>
                                </div>

                                <!-- Información de Compra -->
                                <div class="mb-3" style="min-width: 300px;">
                                    <h6>Información de Compra</h6>
                                    <p><strong>Proyecto:</strong> Residencial Las Palmas</p>
                                    <p><strong>Propiedad:</strong> Lote B-15 (250m²)</p>
                                    <p><strong>Fecha de Compra:</strong> 10/01/2023</p>
                                    <p><strong>Monto Total:</strong> $2,850,000 MXN</p>
                                    <p><strong>Plan de Pago:</strong> Mensualidades (60 meses)</p>
                                    <p><strong>Estado de Pago:</strong> <span class="text-success">Al corriente</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
=======
    </div>
</main>
>>>>>>> c9fd628b3ff62f2610b393ab1417eb8cd8f12007
@endsection
