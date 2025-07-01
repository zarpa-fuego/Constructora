@extends('base.base')

@section('content')
<main class="content">
    <form class="needs-validation" method="post" action="{{ route('clientes.update', $cliente->id) }}" novalidate>
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Editar Cliente: {{ $cliente->nombre }} {{ $cliente->apellido }}</h5>
                <a href="{{ route('clientes.index') }}" class="btn btn-secondary btn-sm float-end">
                    <i class="fas fa-arrow-left"></i> Volver a la lista
                </a>
            </div>

            <div class="card-body">
                @csrf
                @method('PUT')

                {{-- Mostrar errores de validación --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <h6><i class="fas fa-exclamation-triangle"></i> Por favor corrija los siguientes errores:</h6>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row">
                    {{-- Información Personal --}}
                    <div class="col-md-6">
                        <h6 class="text-muted mb-3"><i class="fas fa-user"></i> Información Personal</h6>

                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre *</label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                                   id="nombre" name="nombre" value="{{ old('nombre', $cliente->nombre) }}" required>
                            @error('nombre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido *</label>
                            <input type="text" class="form-control @error('apellido') is-invalid @enderror"
                                   id="apellido" name="apellido" value="{{ old('apellido', $cliente->apellido) }}" required>
                            @error('apellido')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="estado_civil" class="form-label">Estado Civil *</label>
                            <select class="form-control @error('estado_civil') is-invalid @enderror"
                                    id="estado_civil" name="estado_civil" required>
                                <option value="">Seleccione estado civil</option>
                                <option value="Soltero" {{ old('estado_civil', $cliente->estado_civil) == 'Soltero' ? 'selected' : '' }}>Soltero</option>
                                <option value="Casado" {{ old('estado_civil', $cliente->estado_civil) == 'Casado' ? 'selected' : '' }}>Casado</option>
                                <option value="Divorciado" {{ old('estado_civil', $cliente->estado_civil) == 'Divorciado' ? 'selected' : '' }}>Divorciado</option>
                                <option value="Viudo" {{ old('estado_civil', $cliente->estado_civil) == 'Viudo' ? 'selected' : '' }}>Viudo</option>
                                <option value="Conviviente" {{ old('estado_civil', $cliente->estado_civil) == 'Conviviente' ? 'selected' : '' }}>Conviviente</option>
                            </select>
                            @error('estado_civil')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="dni_numero" class="form-label">DNI *</label>
                            <input type="text" class="form-control @error('dni_numero') is-invalid @enderror"
                                   id="dni_numero" name="dni_numero" value="{{ old('dni_numero', $cliente->dni_numero) }}"
                                   required maxlength="8" pattern="[0-9]{8}" placeholder="12345678">
                            <small class="form-text text-muted">Debe contener exactamente 8 dígitos</small>
                            @error('dni_numero')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Información de Contacto --}}
                    <div class="col-md-6">
                        <h6 class="text-muted mb-3"><i class="fas fa-phone"></i> Información de Contacto</h6>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                   id="email" name="email" value="{{ old('email', $cliente->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono *</label>
                            <input type="text" class="form-control @error('telefono') is-invalid @enderror"
                                   id="telefono" name="telefono" value="{{ old('telefono', $cliente->telefono) }}"
                                   required maxlength="11" pattern="[0-9]{9,11}" placeholder="987654321">
                            <small class="form-text text-muted">9 a 11 dígitos</small>
                            @error('telefono')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="distrito_id" class="form-label">Distrito *</label>
                            <select class="form-control @error('distrito_id') is-invalid @enderror"
                                    id="distrito_id" name="distrito_id" required>
                                <option value="">Seleccione un distrito</option>
                                @foreach ($distritos as $distrito)
                                    <optgroup label="{{ $distrito->provincia->departamento->nombre }} - {{ $distrito->provincia->nombre }}">
                                        <option value="{{ $distrito->id }}"
                                                {{ old('distrito_id', $cliente->distrito_id) == $distrito->id ? 'selected' : '' }}>
                                            {{ $distrito->nombre }}
                                        </option>
                                    </optgroup>
                                @endforeach
                            </select>
                            @error('distrito_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="direccion" class="form-label">Dirección *</label>
                            <textarea class="form-control @error('direccion') is-invalid @enderror"
                                      id="direccion" name="direccion" rows="3" required
                                      placeholder="Ingrese la dirección completa">{{ old('direccion', $cliente->direccion) }}</textarea>
                            @error('direccion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button class="btn btn-success" type="submit">
                    <i class="fas fa-save"></i> Actualizar Cliente
                </button>
                <a href="{{ route('clientes.show', $cliente) }}" class="btn btn-info">
                    <i class="fas fa-eye"></i> Ver Detalles
                </a>
                <a href="{{ route('clientes.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Cancelar
                </a>
            </div>
        </div>
    </form>
</main>

<script>
// Validación en tiempo real del DNI
document.getElementById('dni_numero').addEventListener('input', function(e) {
    this.value = this.value.replace(/[^0-9]/g, '').substring(0, 8);
});

// Validación en tiempo real del teléfono
document.getElementById('telefono').addEventListener('input', function(e) {
    this.value = this.value.replace(/[^0-9]/g, '').substring(0, 11);
});
</script>
@endsection
