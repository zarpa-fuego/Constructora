@extends('base.base')

@section('content')
    <div class="container-fluid p-4">

        <!-- Header simplificado -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="h2 text-dark fw-bold mb-1">
                            ✏️ Editar Proyecto
                        </h1>
                        <p class="text-muted mb-0">
                            Modifique los datos para actualizar el proyecto
                        </p>
                    </div>
                    <a href="{{ route('proyecto_listar') }}" class="btn btn-outline-secondary">
                        ← Volver a la lista
                    </a>
                </div>
            </div>
        </div>

        <!-- Formulario Principal -->
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <form method="post" action="/proyectos/update/{{ $proyecto->id }}">
                    @csrf

                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white py-3">
                            <h5 class="mb-0 fw-bold">
                                📋 Información del Proyecto
                            </h5>
                        </div>

                        <div class="card-body p-4">
                            <!-- Sección: Datos Básicos -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="text-warning fw-bold mb-3 border-bottom pb-2">
                                        🏷️ Datos Básicos
                                    </h6>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="nombre" class="form-label fw-bold">
                                        <span class="text-danger">*</span> Nombre del Proyecto
                                    </label>
                                    <input type="text"
                                           class="form-control form-control-lg"
                                           id="nombre"
                                           name="nombre"
                                           placeholder="Ej: Residencial Las Flores"
                                           value="{{ $proyecto->nombre }}"
                                           required>
                                </div>

                                <div class="col-md-6">
                                    <label for="fecha_creacion" class="form-label fw-bold">
                                        <span class="text-danger">*</span> Fecha de Creación
                                    </label>
                                    <input type="date"
                                           class="form-control form-control-lg"
                                           id="fecha_creacion"
                                           name="fecha_creacion"
                                           value="{{ $proyecto->fecha_creacion }}"
                                           required>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-12">
                                    <label for="descripcion" class="form-label fw-bold">
                                        <span class="text-danger">*</span> Descripción
                                    </label>
                                    <textarea class="form-control"
                                              id="descripcion"
                                              name="descripcion"
                                              rows="4"
                                              placeholder="Describa las características principales del proyecto..."
                                              required>{{ $proyecto->descripcion }}</textarea>
                                    <div class="form-text">Mínimo 10 caracteres, máximo 1000 caracteres.</div>
                                </div>
                            </div>

                            <!-- Sección: Datos Técnicos -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="text-success fw-bold mb-3 border-bottom pb-2">
                                        📊 Datos Técnicos
                                    </h6>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="cantidad" class="form-label fw-bold">
                                        <span class="text-danger">*</span> Cantidad de Unidades
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">🏠</span>
                                        <input type="number"
                                               class="form-control form-control-lg"
                                               id="cantidad"
                                               name="cantidad"
                                               placeholder="0"
                                               value="{{ $proyecto->cantidad }}"
                                               min="1"
                                               required>
                                    </div>
                                    <div class="form-text">Número total de unidades habitacionales.</div>
                                </div>

                                <div class="col-md-6">
                                    <label for="areas_verdes" class="form-label fw-bold">
                                        <span class="text-danger">*</span> Áreas Verdes (m²)
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">🌱</span>
                                        <input type="number"
                                               class="form-control form-control-lg"
                                               id="areas_verdes"
                                               name="areas_verdes"
                                               placeholder="0"
                                               value="{{ $proyecto->areas_verdes }}"
                                               min="0"
                                               required>
                                        <span class="input-group-text">m²</span>
                                    </div>
                                    <div class="form-text">Superficie total de áreas verdes en metros cuadrados.</div>
                                </div>
                            </div>

                            <!-- Sección: Documentos -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="text-info fw-bold mb-3 border-bottom pb-2">
                                        📎 Documentos
                                    </h6>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-12">
                                    <label for="foto_plano" class="form-label fw-bold">
                                        📄 Foto del Plano
                                    </label>
                                    <input type="text"
                                           class="form-control form-control-lg"
                                           id="foto_plano"
                                           name="foto_plano"
                                           placeholder="Ingrese el nombre o descripción del archivo del plano"
                                           value="{{ $proyecto->foto_plano }}">
                                    <div class="form-text">
                                        Ingrese el nombre del archivo o descripción del plano (ej: plano_residencial_2025.pdf)
                                    </div>
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
                                            <li>La imagen del plano es opcional pero recomendada</li>
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
                                    <a href="{{ route('proyecto_listar') }}"
                                       class="btn btn-outline-secondary btn-lg px-4">
                                        ❌ Cancelar
                                    </a>
                                    <button type="submit"
                                            class="btn btn-primary btn-lg px-4">
                                        💾 Guardar Cambios
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
