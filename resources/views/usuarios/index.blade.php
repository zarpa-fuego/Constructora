@extends('base.base')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                <i class="bi bi-users me-2"></i>
                Gestión de Usuarios
            </h5>
            <a href="{{ route('usuarios.create') }}" class="btn btn-primary">
                <i class="bi bi-plus me-1"></i>
                Nuevo Usuario
            </a>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-circle me-2"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if($usuarios->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>
                                <i class="bi bi-user me-1"></i>
                                Nombre
                            </th>
                            <th>
                                <i class="bi bi-envelope me-1"></i>
                                Email
                            </th>
                            <th>
                                <i class="bi bi-calendar me-1"></i>
                                Registrado
                            </th>
                            <th class="text-center">
                                <i class="bi bi-cogs me-1"></i>
                                Acciones
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($usuarios as $usuario)
                            <tr>
                                <td class="align-middle">
                                    <span class="badge bg-secondary">{{ $usuario->id }}</span>
                                </td>
                                <td class="align-middle">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar bg-primary rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                <span class="text-white fw-bold">
                                                    {{ strtoupper(substr($usuario->name, 0, 1)) }}
                                                </span>
                                        </div>
                                        <div>
                                            <span class="fw-bold">{{ $usuario->name }}</span>
                                            @if($usuario->id === auth()->id())
                                                <span class="badge bg-success ms-2">Tú</span>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <span class="text-muted">{{ $usuario->email }}</span>
                                </td>
                                <td class="align-middle">
                                        <span class="text-muted">
                                            {{ $usuario->created_at->format('d/m/Y') }}
                                        </span>
                                    <br>
                                    <small class="text-muted">
                                        {{ $usuario->created_at->diffForHumans() }}
                                    </small>
                                </td>
                                <td class="text-center align-middle">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('usuarios.show', $usuario) }}"
                                           class="btn btn-sm btn-outline-info" title="Ver detalles">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('usuarios.edit', $usuario) }}"
                                           class="btn btn-sm btn-outline-warning" title="Editar">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        @if($usuario->id !== auth()->id())
                                            <button type="button" class="btn btn-sm btn-outline-danger"
                                                    title="Eliminar" onclick="confirmarEliminacion({{ $usuario->id }})">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Paginación -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $usuarios->links() }}
                </div>

                <!-- Información adicional -->
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="card bg-light">
                            <div class="card-body text-center">
                                <h5 class="card-title text-primary">
                                    <i class="bi bi-users me-2"></i>
                                    Total Usuarios
                                </h5>
                                <h2 class="text-primary">{{ $usuarios->total() }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card bg-light">
                            <div class="card-body text-center">
                                <h5 class="card-title text-success">
                                    <i class="bi bi-user-plus me-2"></i>
                                    Registros Hoy
                                </h5>
                                <h2 class="text-success">
                                    {{ \App\Models\User::whereDate('created_at', today())->count() }}
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <!-- Estado vacío -->
                <div class="text-center py-5">
                    <div class="mb-4">
                        <i class="bi bi-users text-muted" style="font-size: 4rem;"></i>
                    </div>
                    <h4 class="text-muted">No hay usuarios registrados</h4>
                    <p class="text-muted mb-4">Comienza creando el primer usuario</p>
                    <a href="{{ route('usuarios.create') }}" class="btn btn-primary btn-lg">
                        <i class="bi bi-plus me-2"></i>
                        Crear Primer Usuario
                    </a>
                </div>
            @endif
        </div>
    </div>

    <!-- Modal de confirmación para eliminar -->
    <div class="modal fade" id="modalEliminar" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="bi bi-exclamation-triangle text-danger me-2"></i>
                        Confirmar Eliminación
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro de que deseas eliminar este usuario?</p>
                    <p class="text-danger">
                        <strong>Esta acción no se puede deshacer.</strong>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-times me-1"></i>
                        Cancelar
                    </button>
                    <form id="formEliminar" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-trash me-1"></i>
                            Eliminar Usuario
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmarEliminacion(usuarioId) {
            const form = document.getElementById('formEliminar');
            form.action = `/usuarios/${usuarioId}`;
            const modal = new bootstrap.Modal(document.getElementById('modalEliminar'));
            modal.show();
        }
    </script>
@endsection
