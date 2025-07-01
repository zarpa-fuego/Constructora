@extends('base.base')

@section('content')
    <div class="container-fluid p-4">

        <!-- Header -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="h2 text-dark fw-bold mb-1">
                            🏠 Crear Nuevo Lote
                        </h1>
                        <p class="text-muted mb-0">
                            Agregue un nuevo lote al proyecto: <strong class="text-primary">{{ $proyecto->nombre }}</strong>
                        </p>
                    </div>
                    <a href="/proyectos/{{ $proyecto->id }}/lotes" class="btn btn-outline-secondary">
                        ← Volver a Lotes
                    </a>
                </div>
            </div>
        </div>

        <!-- Información del Proyecto -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card border-primary bg-primary bg-opacity-10">
                    <div class="card-header bg-primary text-white">
                        <h6 class="mb-0 fw-bold">
                            📋 Proyecto: {{ $proyecto->nombre }}
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <small class="text-muted">Fecha Creación:</small><br>
                                <strong>{{ date('d/m/Y', strtotime($proyecto->fecha_creacion)) }}</strong>
                            </div>
                            <div class="col-md-3">
                                <small class="text-muted">Unidades:</small><br>
                                <strong>{{ $proyecto->cantidad }}</strong>
                            </div>
                            <div class="col-md-3">
                                <small class="text-muted">Áreas Verdes:</small><br>
                                <strong>{{ $proyecto->areas_verdes }} m²</strong>
                            </div>
                            <div class="col-md-3">
                                <small class="text-muted">Descripción:</small><br>
                                <span>{{ Str::limit($proyecto->descripcion, 50) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Formulario Principal -->
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                <form method="post" action="{{ route('lote_store', $proyecto) }}">
                    @csrf

                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white py-3">
                            <h5 class="mb-0 fw-bold">
                                📋 Información del Lote
                            </h5>
                        </div>

                        <div class="card-body p-4">
                            <!-- Sección: Información Básica -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="text-primary fw-bold mb-3 border-bottom pb-2">
                                        💰 Información Básica
                                    </h6>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label for="precio" class="form-label fw-bold">
                                        <span class="text-danger">*</span> Precio
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">💰</span>
                                        <input type="number"
                                               class="form-control form-control-lg"
                                               id="precio"
                                               name="precio"
                                               placeholder="0.00"
                                               step="0.01"
                                               min="0"
                                               required>
                                    </div>
                                    <div class="form-text">Precio de venta del lote.</div>
                                </div>

                                <div class="col-md-4">
                                    <label for="nro_lote" class="form-label fw-bold">
                                        <span class="text-danger">*</span> Número de Lote
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">🏷️</span>
                                        <input type="number"
                                               class="form-control form-control-lg"
                                               id="nro_lote"
                                               name="nro_lote"
                                               placeholder="1"
                                               min="1"
                                               required>
                                    </div>
                                    <div class="form-text">Número identificador del lote.</div>
                                </div>

                                <div class="col-md-4">
                                    <label for="estado" class="form-label fw-bold">
                                        <span class="text-danger">*</span> Estado
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">📝</span>
                                        <select class="form-control form-control-lg" id="estado" name="estado" required>
                                            <option value="">Seleccionar estado</option>
                                            <option value="Disponible">✅ Disponible</option>
                                            <option value="Reservado">🔒 Reservado</option>
                                            <option value="Vendido">💰 Vendido</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Sección: Límites -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="text-danger fw-bold mb-3 border-bottom pb-2">
                                        📍 Límites del Lote
                                    </h6>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="limite_norte" class="form-label fw-bold">
                                        <span class="text-danger">*</span> Límite del Norte
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">⬆️</span>
                                        <input type="number"
                                               class="form-control form-control-lg"
                                               id="limite_norte"
                                               name="limite_norte"
                                               placeholder="0"
                                               step="0.01"
                                               min="0"
                                               required>
                                        <span class="input-group-text">m</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="limite_sur" class="form-label fw-bold">
                                        <span class="text-danger">*</span> Límite del Sur
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">⬇️</span>
                                        <input type="number"
                                               class="form-control form-control-lg"
                                               id="limite_sur"
                                               name="limite_sur"
                                               placeholder="0"
                                               step="0.01"
                                               min="0"
                                               required>
                                        <span class="input-group-text">m</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="limite_este" class="form-label fw-bold">
                                        <span class="text-danger">*</span> Límite del Este
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">➡️</span>
                                        <input type="number"
                                               class="form-control form-control-lg"
                                               id="limite_este"
                                               name="limite_este"
                                               placeholder="0"
                                               step="0.01"
                                               min="0"
                                               required>
                                        <span class="input-group-text">m</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="limite_oeste" class="form-label fw-bold">
                                        <span class="text-danger">*</span> Límite del Oeste
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">⬅️</span>
                                        <input type="number"
                                               class="form-control form-control-lg"
                                               id="limite_oeste"
                                               name="limite_oeste"
                                               placeholder="0"
                                               step="0.01"
                                               min="0"
                                               required>
                                        <span class="input-group-text">m</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Sección: Ubicación -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="text-warning fw-bold mb-3 border-bottom pb-2">
                                        🏘️ Ubicación
                                    </h6>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="manzana" class="form-label fw-bold">
                                        <span class="text-danger">*</span> Manzana
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">🏘️</span>
                                        <input type="text"
                                               class="form-control form-control-lg"
                                               id="manzana"
                                               name="manzana"
                                               placeholder="Ej: A, B, 1, 2"
                                               required>
                                    </div>
                                    <div class="form-text">Identificador de la manzana.</div>
                                </div>

                                <div class="col-md-6">
                                    <label for="sector" class="form-label fw-bold">
                                        <span class="text-danger">*</span> Sector
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">📍</span>
                                        <input type="text"
                                               class="form-control form-control-lg"
                                               id="sector"
                                               name="sector"
                                               placeholder="Ej: Norte, Sur, Central"
                                               required>
                                    </div>
                                    <div class="form-text">Sector donde se ubica el lote.</div>
                                </div>
                            </div>

                            <!-- Sección: Medidas -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="text-success fw-bold mb-3 border-bottom pb-2">
                                        📏 Medidas
                                    </h6>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="perimetro" class="form-label fw-bold">
                                        <span class="text-danger">*</span> Perímetro
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">📏</span>
                                        <input type="number"
                                               class="form-control form-control-lg"
                                               id="perimetro"
                                               name="perimetro"
                                               placeholder="0"
                                               step="0.01"
                                               min="0"
                                               required>
                                        <span class="input-group-text">m</span>
                                    </div>
                                    <div class="form-text">Perímetro total del lote en metros.</div>
                                </div>

                                <div class="col-md-6">
                                    <label for="area" class="form-label fw-bold">
                                        <span class="text-danger">*</span> Área
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">📐</span>
                                        <input type="number"
                                               class="form-control form-control-lg"
                                               id="area"
                                               name="area"
                                               placeholder="0"
                                               step="0.01"
                                               min="0"
                                               required>
                                        <span class="input-group-text">m²</span>
                                    </div>
                                    <div class="form-text">Área total del lote en metros cuadrados.</div>
                                </div>
                            </div>

                            <!-- Información importante -->
                            <div class="alert alert-info border-0">
                                <div class="d-flex">
                                    <div class="me-3">
                                        <span style="font-size: 1.5rem;">💡</span>
                                    </div>
                                    <div>
                                        <h6 class="alert-heading">Información importante:</h6>
                                        <ul class="mb-0">
                                            <li>Los campos marcados con <span class="text-danger">*</span> son obligatorios</li>
                                            <li>Las medidas deben ingresarse en metros</li>
                                            <li>El número de lote debe ser único dentro del proyecto</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-light py-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="text-muted small">
                                    <span class="text-danger">*</span> Campos obligatorios
                                </div>
                                <div class="btn-group">
                                    <a href="/proyectos/{{ $proyecto->id }}/lotes"
                                       class="btn btn-outline-secondary btn-lg px-4">
                                        ❌ Cancelar
                                    </a>
                                    <button type="submit"
                                            class="btn btn-primary btn-lg px-4">
                                        ✅ Crear Lote
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Espaciado inferior -->
        <div class="mb-5"></div>
    </div>

@endsection
