@extends('base.base')

@section('content')
<main class="content">
    <div class="container-fluid">
        <div class="card shadow-sm border-0">

           <div class="card-header text-white d-flex justify-content-between align-items-center"
     style="background: linear-gradient(90deg, #2563eb 0%, #1e40af 100%); border-top-left-radius: .5rem; border-top-right-radius: .5rem;">
    <h5 class="mb-0"><i class="fas fa-user-plus"></i> Nuevo Cliente</h5>
    <a href="{{ route('clientes.index') }}" class="btn btn-outline-light btn-sm">
        <i class="fas fa-arrow-left"></i> Volver a la lista
    </a>
</div>
            <div class="card-body bg-white"
     style="border: 2px solid #2563eb; border-top: none; border-bottom-left-radius: .5rem; border-bottom-right-radius: .5rem;">
                <form method="POST" action="{{ route('clientes.store') }}" class="needs-validation" novalidate autocomplete="off">
                    @csrf
                    <div class="row g-4">
                        {{-- Información Personal --}}
                        <div class="col-md-6 border-end">
                            <h6 class="text-primary mb-3"><i class="fas fa-user"></i> Información Personal</h6>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre *</label>
                                <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                                    id="nombre" name="nombre" value="{{ old('nombre') }}" required autofocus>
                                @error('nombre')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="apellido" class="form-label">Apellido *</label>
                                <input type="text" class="form-control @error('apellido') is-invalid @enderror"
                                    id="apellido" name="apellido" value="{{ old('apellido') }}" required>
                                @error('apellido')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="estado_civil" class="form-label">Estado Civil *</label>
                                <select class="form-select @error('estado_civil') is-invalid @enderror"
                                        id="estado_civil" name="estado_civil" required>
                                    <option value="">Seleccione estado civil</option>
                                    <option value="Soltero" {{ old('estado_civil') == 'Soltero' ? 'selected' : '' }}>Soltero</option>
                                    <option value="Casado" {{ old('estado_civil') == 'Casado' ? 'selected' : '' }}>Casado</option>
                                    <option value="Divorciado" {{ old('estado_civil') == 'Divorciado' ? 'selected' : '' }}>Divorciado</option>
                                    <option value="Viudo" {{ old('estado_civil') == 'Viudo' ? 'selected' : '' }}>Viudo</option>
                                    <option value="Conviviente" {{ old('estado_civil') == 'Conviviente' ? 'selected' : '' }}>Conviviente</option>
                                </select>
                                @error('estado_civil')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="dni_numero" class="form-label">DNI *</label>
                                <input type="text" class="form-control @error('dni_numero') is-invalid @enderror"
                                    id="dni_numero" name="dni_numero" value="{{ old('dni_numero') }}"
                                    required maxlength="8" pattern="[0-9]{8}" placeholder="12345678">
                                @error('dni_numero')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">Debe contener exactamente 8 dígitos</small>
                            </div>
                        </div>
                        {{-- Información de Contacto --}}
                        <div class="col-md-6">
                            <h6 class="text-primary mb-3"><i class="fas fa-phone"></i> Información de Contacto</h6>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email *</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono *</label>
                                <input type="text" class="form-control @error('telefono') is-invalid @enderror"
                                    id="telefono" name="telefono" value="{{ old('telefono') }}"
                                    required maxlength="11" pattern="[0-9]{9,11}" placeholder="987654321">
                                @error('telefono')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">9 a 11 dígitos</small>
                            </div>
                            <div class="mb-3">
                                <label for="departamento_id" class="form-label">Departamento *</label>
                                <select class="form-select" id="departamento_id" name="departamento_id" required>
                                    <option value="">Seleccione un departamento</option>
                                    @foreach($departamentos as $departamento)
                                        <option value="{{ $departamento->id }}" {{ old('departamento_id') == $departamento->id ? 'selected' : '' }}>
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
                            <div class="mb-3">
                                <label for="direccion" class="form-label">Dirección *</label>
                                <textarea class="form-control @error('direccion') is-invalid @enderror"
                                    id="direccion" name="direccion" rows="3" required
                                    placeholder="Ingrese la dirección completa">{{ old('direccion') }}</textarea>
                                @error('direccion')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <button class="btn btn-success" type="submit">
                            <i class="fas fa-save"></i> Guardar Cliente
                        </button>
                        <a href="{{ route('clientes.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
