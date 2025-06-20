@extends('base.base')


@section('content')

    <main class="content">
        <div class="container-fluid p-0">
            <!-- Header con título y botones -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="h3 mb-0"><strong>Gestionar</strong> Lotes</h1>
                <div>
                    <button class="btn btn-outline-primary me-2" onclick="exportarLotes()">
                        <i class="align-middle" data-feather="download"></i>
                        Exportar</button>
                    <button class="btn btn-outline-primary me-2" onclick="nuevoLote()">
                        <i class="align-middle" data-feather="plus"></i>
                        Nuevo Lote</button>
                </div>
            </div>
            <div class="row">
                <!-- Real-Time: Visualizador de Planos PDF -->
                <div class="col-12 col-md-8 col-xxl-9 d-flex">
                    <div class="card flex-fill w-100">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Plano del proyecto</h5>
                            <div>
                                <button class="btn btn-sm btn-outline-secondary me-2" onclick="cargarPlano()">
                                    <i class="align-middle" data-feather="upload"></i>
                                    Cargar Plano
                                </button>
                                <button class="btn btn-sm btn-outline-secondary me-2" onclick="descargarPlano()">
                                    <i class="align-middle" data-feather="download"></i>
                                    Descargar
                                </button>
                            </div>
                        </div>
                        <div class="card-body px-4">
                            <!-- Contenedor para el PDF -->
                            <div id="pdf_viewer" style="height:400px; border: 1px solid #dee2e6; border-radius: 0.375rem;">
                                <div class="d-flex align-items-center justify-content-center h-100 text-muted">
                                    <div class="text-center">
                                        <i data-feather="file-text" style="width: 48px; height: 48px;"></i>
                                        <p class="mt-2">No hay plano cargado</p>
                                        <small>Haga clic en "Cargar Plano" para subir un archivo PDF</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Browser Usage: Estadísticas de Lotes -->
                <div class="col-12 col-md-4 col-xxl-3 d-flex">
                    <div class="card flex-fill w-100">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Estadisticas de Lotes</h5>
                        </div>
                        <div class="card-body d-flex">
                            <div class="align-self-center w-100">
                                <div class="py-3">
                                    <div class="chart chart-xs">
                                        <canvas id="chartjs-lotes-pie"></canvas>
                                    </div>
                                </div>
                                <table class="table mb-0">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <span class="badge bg-success me-2"></span>
                                            Disponibles
                                        </td>
                                        <td class="text-end" id="lotes-disponibles">0</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="badge bg-warning me-2"></span>
                                            Reservados
                                        </td>
                                        <td class="text-end" id="lotes-reservados">0</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="badge bg-danger me-2"></span>
                                            Vendidos
                                        </td>
                                        <td class="text-end" id="lotes-vendidos">0</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Segunda fila: Tabla de Lotes -->
            <div class="row">
                <div class="col-12 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Lista de Lotes</h5>
                            <div class="d-flex">
                                <input type="text" class="form-control me-2" placeholder="Buscar lote..." style="width: 200px;">
                                <select class="form-select" style="width: 150px;">
                                    <option value="">Todos</option>
                                    <option value="disponible">Disponibles</option>
                                    <option value="reservado">Reservados</option>
                                    <option value="vendido">Vendidos</option>
                                </select>
                            </div>
                        </div>
                        <table class="table table-hover my-0">
                            <thead>
                            <tr>
                                <th>N° Lote</th>
                                <th class="d-none d-xl-table-cell">Manzana</th>
                                <th class="d-none d-xl-table-cell">Área (m²)</th>
                                <th>Estado</th>
                                <th class="d-none d-md-table-cell">Precio</th>
                                <th class="d-none d-md-table-cell">Cliente</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody id="tabla-lotes">
                            <tr>
                                <td>L-001</td>
                                <td class="d-none d-xl-table-cell">A</td>
                                <td class="d-none d-xl-table-cell">250.00</td>
                                <td><span class="badge bg-success">Disponible</span></td>
                                <td class="d-none d-md-table-cell">S/ 45,000</td>
                                <td class="d-none d-md-table-cell">-</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary" onclick="editarLote('L-001')">
                                        <i data-feather="edit-2"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger" onclick="eliminarLote('L-001')">
                                        <i data-feather="trash-2"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>L-002</td>
                                <td class="d-none d-xl-table-cell">A</td>
                                <td class="d-none d-xl-table-cell">280.00</td>
                                <td><span class="badge bg-warning">Reservado</span></td>
                                <td class="d-none d-md-table-cell">S/ 50,400</td>
                                <td class="d-none d-md-table-cell">Juan Pérez</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary" onclick="editarLote('L-002')">
                                        <i data-feather="edit-2"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger" onclick="eliminarLote('L-002')">
                                        <i data-feather="trash-2"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>L-003</td>
                                <td class="d-none d-xl-table-cell">A</td>
                                <td class="d-none d-xl-table-cell">300.00</td>
                                <td><span class="badge bg-danger">Vendido</span></td>
                                <td class="d-none d-md-table-cell">S/ 54,000</td>
                                <td class="d-none d-md-table-cell">María García</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary" onclick="editarLote('L-003')">
                                        <i data-feather="edit-2"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-secondary" disabled>
                                        <i data-feather="trash-2"></i>
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
