@extends('base.base')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="bi bi-user-edit me-2"></i>
                        Editar Usuario: {{ $usuario->name }}
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('usuarios.update', $usuario) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Campo Nombre -->
                        <div class="mb-3">
                            <label for="name" class="form-label">
                                <i class="bi bi-user me-1"></i>
                                Nombre <span class="text-danger">*</span>
                            </label>
                            <input type="text"
                                   class="form-control @error('name') is-invalid @enderror"
                                   id="name"
                                   name="name"
                                   value="{{ old('name', $usuario->name) }}"
                                   required
                                   placeholder="Nombre completo del usuario">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Campo Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">
                                <i class="bi bi-envelope me-1"></i>
                                Email <span class="text-danger">*</span>
                            </label>
                            <input type="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   id="email"
                                   name="email"
                                   value="{{ old('email', $usuario->email) }}"
                                   required
                                   placeholder="correo@ejemplo.com">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Separador -->
                        <hr>
                        <div class="alert alert-info">
                            <i class="bi bi-info-circle me-2"></i>
                            <strong>Cambiar Contraseña:</strong> Deja estos campos vacíos si no deseas cambiar la contraseña.
                        </div>

                        <!-- Campo Nueva Contraseña -->
                        <div class="mb-3">
                            <label for="password" class="form-label">
                                <i class="bi bi-lock me-1"></i>
                                Nueva Contraseña
                            </label>
                            <div class="input-group">
                                <input type="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       id="password"
                                       name="password"
                                       placeholder="Dejar vacío para mantener la actual">
                                <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password')">
                                    <i class="bi bi-eye" id="togglePassword"></i>
                                </button>
                            </div>
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-text">
                                <i class="bi bi-info-circle me-1"></i>
                                La contraseña debe tener al menos 8 caracteres
                            </div>
                        </div>

                        <!-- Campo Confirmar Nueva Contraseña -->
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label">
                                <i class="bi bi-lock me-1"></i>
                                Confirmar Nueva Contraseña
                            </label>
                            <div class="input-group">
                                <input type="password"
                                       class="form-control @error('password_confirmation') is-invalid @enderror"
                                       id="password_confirmation"
                                       name="password_confirmation"
                                       placeholder="Repetir nueva contraseña">
                                <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password_confirmation')">
                                    <i class="bi bi-eye" id="togglePasswordConfirmation"></i>
                                </button>
                            </div>
                            @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Información adicional -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h6 class="card-title">
                                            <i class="bi bi-calendar-plus me-1"></i>
                                            Fecha de Registro
                                        </h6>
                                        <p class="card-text">{{ $usuario->created_at->format('d/m/Y H:i') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h6 class="card-title">
                                            <i class="bi bi-edit me-1"></i>
                                            Última Actualización
                                        </h6>
                                        <p class="card-text">{{ $usuario->updated_at->format('d/m/Y H:i') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Botones -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary me-md-2">
                                <i class="bi bi-arrow-left me-1"></i>
                                Cancelar
                            </a>
                            <a href="{{ route('usuarios.show', $usuario) }}" class="btn btn-info me-md-2">
                                <i class="bi bi-eye me-1"></i>
                                Ver Usuario
                            </a>
                            <button type="submit" class="btn btn-warning">
                                <i class="bi bi-save me-1"></i>
                                Actualizar Usuario
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const icon = document.getElementById('toggle' + fieldId.charAt(0).toUpperCase() + fieldId.slice(1));

            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                field.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        // Validación en tiempo real de contraseñas
        document.getElementById('password_confirmation').addEventListener('input', function() {
            const password = document.getElementById('password').value;
            const confirmation = this.value;

            if (confirmation && password !== confirmation) {
                this.classList.add('is-invalid');
                this.classList.remove('is-valid');
            } else if (confirmation) {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
            }
        });

        // Limpiar confirmación si se borra la contraseña
        document.getElementById('password').addEventListener('input', function() {
            const confirmation = document.getElementById('password_confirmation');
            if (!this.value) {
                confirmation.value = '';
                confirmation.classList.remove('is-invalid', 'is-valid');
            }
        });
    </script>
@endsection
