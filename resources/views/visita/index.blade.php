@extends('base.base')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                <i class="fas fa-calendar-check me-2"></i>
                Registro de Visitas
            </h5>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fas fa-plus me-1"></i>
                Nueva Visita
            </button>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if($registroVisitas->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">
                                <i class="fas fa-calendar me-1"></i>
                                Fecha
                            </th>
                            <th scope="col">
                                <i class="fas fa-clock me-1"></i>
                                Hora
                            </th>
                            <th scope="col">
                                <i class="fas fa-user me-1"></i>
                                Cliente
                            </th>
                            <th scope="col">
                                <i class="fas fa-sticky-note me-1"></i>
                                Observaciones
                            </th>
                            <th scope="col" class="text-center">
                                <i class="fas fa-cogs me-1"></i>
                                Acciones
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($registroVisitas as $visita)
                            <tr>
                                <td class="align-middle">
                                    <span class="badge bg-secondary">{{ $loop->iteration }}</span>
                                </td>
                                <td class="align-middle">
                                    <span
                                        class="fw-bold">{{ \Carbon\Carbon::parse($visita->fecha)->format('d/m/Y') }}</span>
                                    <br>
                                    <small
                                        class="text-muted">{{ \Carbon\Carbon::parse($visita->fecha)->format('l') }}</small>
                                </td>
                                <td class="align-middle">
                                    @if($visita->hora)
                                        <span class="badge bg-info">
                                                <i class="fas fa-clock me-1"></i>
                                                {{ \Carbon\Carbon::parse($visita->hora)->format('H:i') }}
                                            </span>
                                    @else
                                        <span class="text-muted">
                                                <i class="fas fa-minus"></i>
                                                No especificada
                                            </span>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    @if($visita->cliente)
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="avatar bg-primary rounded-circle me-2 d-flex align-items-center justify-content-center"
                                                style="width: 32px; height: 32px;">
                                                <i class="fas fa-user text-white" style="font-size: 12px;"></i>
                                            </div>
                                            <span class="fw-medium">{{ $visita->cliente }}</span>
                                        </div>
                                    @else
                                        <span class="text-muted">
                                                <i class="fas fa-user-slash me-1"></i>
                                                Sin especificar
                                            </span>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    @if($visita->observacion)
                                        <span class="text-truncate d-inline-block" style="max-width: 200px;"
                                              title="{{ $visita->observacion }}">
                                                {{ $visita->observacion }}
                                            </span>
                                    @else
                                        <span class="text-muted">
                                                <i class="fas fa-minus"></i>
                                                Sin observaciones
                                            </span>
                                    @endif
                                </td>
                                <td class="text-center align-middle">
                                    <div class="btn-group" role="group">

                                        <a href="{{route('visitas.destroy',$visita )}}" type="button"
                                           class="btn btn-sm btn-outline-danger" title="Eliminar">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Información adicional -->
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="card bg-light">
                            <div class="card-body text-center">
                                <h5 class="card-title text-primary">
                                    <i class="fas fa-chart-line me-2"></i>
                                    Total de Visitas
                                </h5>
                                <h2 class="text-primary">{{ $registroVisitas->count() }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card bg-light">
                            <div class="card-body text-center">
                                <h5 class="card-title text-success">
                                    <i class="fas fa-calendar-day me-2"></i>
                                    Visitas Hoy
                                </h5>
                                <h2 class="text-success">
                                    {{ $registroVisitas->where('fecha', date('Y-m-d'))->count() }}
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <!-- Estado vacío -->
                <div class="text-center py-5">
                    <div class="mb-4">
                        <i class="fas fa-calendar-times text-muted" style="font-size: 4rem;"></i>
                    </div>
                    <h4 class="text-muted">No hay visitas registradas</h4>
                    <p class="text-muted mb-4">Comienza registrando tu primera visita</p>
                    <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                        <i class="fas fa-plus me-2"></i>
                        Registrar Primera Visita
                    </button>
                </div>
            @endif
        </div>
    </div>

    <!-- Modal (tu formulario existente) -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <i class="fas fa-plus-circle me-2"></i>
                        Nueva Visita
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('visitas.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                        <div class="mb-3">
                            <label for="fecha" class="form-label">
                                <i class="fas fa-calendar-day me-1"></i>
                                Fecha <span class="text-danger">*</span>
                            </label>
                            <input type="date" class="form-control @error('fecha') is-invalid @enderror"
                                   id="fecha" name="fecha" value="{{ old('fecha', date('Y-m-d')) }}" required>
                            @error('fecha')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="hora" class="form-label">
                                <i class="fas fa-clock me-1"></i>
                                Hora
                            </label>
                            <input type="time" class="form-control @error('hora') is-invalid @enderror"
                                   id="hora" name="hora" value="{{ old('hora') }}">
                            @error('hora')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="cliente" class="form-label">
                                <i class="fas fa-user me-1"></i>
                                Cliente
                            </label>
                            <input type="text" class="form-control @error('cliente') is-invalid @enderror"
                                   id="cliente" name="cliente" value="{{ old('cliente') }}"
                                   maxlength="150" placeholder="Nombre del cliente">
                            @error('cliente')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="observacion" class="form-label">
                                <i class="fas fa-sticky-note me-1"></i>
                                Observaciones
                            </label>
                            <textarea class="form-control @error('observacion') is-invalid @enderror"
                                      id="observacion" name="observacion" rows="3" maxlength="150"
                                      placeholder="Observaciones adicionales">{{ old('observacion') }}</textarea>
                            @error('observacion')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="button" class="btn btn-secondary me-md-2" data-bs-dismiss="modal">
                                <i class="fas fa-times me-1"></i>
                                Cancelar
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i>
                                Guardar Visita
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const horaInput = document.getElementById('hora');
            if (!horaInput.value) {
                const now = new Date();
                const currentTime = now.getHours().toString().padStart(2, '0') + ':' +
                    now.getMinutes().toString().padStart(2, '0');
                horaInput.value = currentTime;
            }
        });
    </script>
@endsection
