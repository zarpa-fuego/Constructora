@extends('base.base')

@section('content')
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
                    </div>
                </div>
            </div>
        </div>
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
@endsection
