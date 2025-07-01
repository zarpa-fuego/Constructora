@extends('base.base')

@section('content')
<main class="content">
    <form class="needs-validation" method="post" action="{{ route('clientes.update', $cliente->id) }}" novalidate>
        <div class="card shadow-sm bg-light">
           <div class="card-header text-white d-flex justify-content-between align-items-center"
     style="background: linear-gradient(90deg, #2563eb 0%, #1e40af 100%); border-top-left-radius: .5rem; border-top-right-radius: .5rem;">
    <h5 class="mb-0"><i class="fas fa-user-edit"></i> Editar Cliente: {{ $cliente->nombre }} {{ $cliente->apellido }}</h5>
    <a href="{{ route('clientes.index') }}" class="btn btn-outline-light btn-sm">
        <i class="fas fa-arrow-left"></i> Volver a la lista
    </a>
</div>

            <div class="card-body"style="border: 2px solid #2563eb; border-top: none; border-bottom-left-radius: .5rem; border-bottom-right-radius: .5rem;">
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
<div class="col-md-6 border-end">
    <h6 class="text-primary mb-3"><i class="fas fa-user"></i> Información Personal</h6>

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre *</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-user"></i></span>
            <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                   id="nombre" name="nombre" value="{{ old('nombre', $cliente->nombre) }}" required>
            @error('nombre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="mb-3">
        <label for="apellido" class="form-label">Apellido *</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
            <input type="text" class="form-control @error('apellido') is-invalid @enderror"
                   id="apellido" name="apellido" value="{{ old('apellido', $cliente->apellido) }}" required>
            @error('apellido')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="mb-3">
        <label for="estado_civil" class="form-label">Estado Civil *</label>
        <select class="form-select @error('estado_civil') is-invalid @enderror"
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
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
            <input type="text" class="form-control @error('dni_numero') is-invalid @enderror"
                   id="dni_numero" name="dni_numero" value="{{ old('dni_numero', $cliente->dni_numero) }}"
                   required maxlength="8" pattern="[0-9]{8}" placeholder="12345678">
            @error('dni_numero')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <small class="form-text text-muted">Debe contener exactamente 8 dígitos</small>
    </div>
</div>

                   {{-- Información de Contacto --}}
<div class="col-md-6">
    <h6 class="text-primary mb-3"><i class="fas fa-phone"></i> Información de Contacto</h6>

    <div class="mb-3">
        <label for="email" class="form-label">Email *</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            <input type="email" class="form-control @error('email') is-invalid @enderror"
                   id="email" name="email" value="{{ old('email', $cliente->email) }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="mb-3">
        <label for="telefono" class="form-label">Teléfono *</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-phone"></i></span>
            <input type="text" class="form-control @error('telefono') is-invalid @enderror"
                   id="telefono" name="telefono" value="{{ old('telefono', $cliente->telefono) }}"
                   required maxlength="11" pattern="[0-9]{9,11}" placeholder="987654321">
            @error('telefono')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <small class="form-text text-muted">9 a 11 dígitos</small>
    </div>

    <div class="mb-3">
    <label for="departamento_id" class="form-label">Departamento *</label>
    <select class="form-select" id="departamento_id" name="departamento_id" required>
        <option value="">Seleccione un departamento</option>
        @foreach($departamentos as $departamento)
            <option value="{{ $departamento->id }}"
                {{ old('departamento_id', optional($cliente->distrito->provincia->departamento ?? null)->id) == $departamento->id ? 'selected' : '' }}>
                {{ $departamento->nombre }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label for="provincia_id" class="form-label">Provincia *</label>
    <select class="form-select" id="provincia_id" name="provincia_id" required>
        <option value="">Seleccione una provincia</option>
    </select>
</div>
<div class="mb-3">
    <label for="distrito_id" class="form-label">Distrito *</label>
    <select class="form-select @error('distrito_id') is-invalid @enderror"
            id="distrito_id" name="distrito_id" required>
        <option value="">Seleccione un distrito</option>
    </select>
    @error('distrito_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
</div>
                </div>
            </div>

            <div class="card-footer d-flex justify-content-end gap-2">
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

// Precargar provincias y distritos en edición
window.addEventListener('DOMContentLoaded', function() {
    let departamentoId = "{{ old('departamento_id', optional($cliente->distrito->provincia->departamento ?? null)->id) }}";
    let provinciaId = "{{ old('provincia_id', optional($cliente->distrito->provincia ?? null)->id) }}";
    let distritoId = "{{ old('distrito_id', $cliente->distrito_id) }}";

    if(departamentoId) {
        fetch(`/api/provincias/${departamentoId}`)
            .then(res => res.json())
            .then(data => {
                let provinciaSelect = document.getElementById('provincia_id');
                provinciaSelect.innerHTML = '<option value="">Seleccione una provincia</option>';
                data.forEach(function(provincia) {
                    provinciaSelect.innerHTML += `<option value="${provincia.id}" ${provincia.id == provinciaId ? 'selected' : ''}>${provincia.nombre}</option>`;
                });

                // Cargar distritos si hay provincia seleccionada
                if(provinciaId) {
                    fetch(`/api/distritos/${provinciaId}`)
                        .then(res => res.json())
                        .then(data => {
                            let distritoSelect = document.getElementById('distrito_id');
                            distritoSelect.innerHTML = '<option value="">Seleccione un distrito</option>';
                            data.forEach(function(distrito) {
                                distritoSelect.innerHTML += `<option value="${distrito.id}" ${distrito.id == distritoId ? 'selected' : ''}>${distrito.nombre}</option>`;
                            });
                        });
                }
            });
    }
});

// Select dependiente: provincias por departamento
document.getElementById('departamento_id').addEventListener('change', function() {
    let departamentoId = this.value;
    let provinciaSelect = document.getElementById('provincia_id');
    let distritoSelect = document.getElementById('distrito_id');
    provinciaSelect.innerHTML = '<option value="">Seleccione una provincia</option>';
    distritoSelect.innerHTML = '<option value="">Seleccione un distrito</option>';
    if(departamentoId) {
        fetch(`/api/provincias/${departamentoId}`)
            .then(res => res.json())
            .then(data => {
                data.forEach(function(provincia) {
                    provinciaSelect.innerHTML += `<option value="${provincia.id}">${provincia.nombre}</option>`;
                });
            });
    }
});

// Select dependiente: distritos por provincia
document.getElementById('provincia_id').addEventListener('change', function() {
    let provinciaId = this.value;
    let distritoSelect = document.getElementById('distrito_id');
    distritoSelect.innerHTML = '<option value="">Seleccione un distrito</option>';
    if(provinciaId) {
        fetch(`/api/distritos/${provinciaId}`)
            .then(res => res.json())
            .then(data => {
                data.forEach(function(distrito) {
                    distritoSelect.innerHTML += `<option value="${distrito.id}">${distrito.nombre}</option>`;
                });
            });
    }
});
</script>
@endsection
