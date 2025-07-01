@extends('base.base')

@section('content')
<main class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm bg-light"style="border: 2px solid #2563eb; border-top: none; border-bottom-left-radius: .5rem; border-bottom-right-radius: .5rem;">
                   <div class="card-header text-white d-flex justify-content-between align-items-center"
     style="background: linear-gradient(90deg, #2563eb 0%, #1e40af 100%); border-top-left-radius: .5rem; border-top-right-radius: .5rem;">
    <h5 class="mb-0"><i class="fas fa-address-card"></i> Detalle del Cliente</h5>
    <a href="{{ route('clientes.index') }}" class="btn btn-outline-light btn-sm">
        <i class="fas fa-arrow-left"></i> Volver a la lista
    </a>
</div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <h6 class="text-primary"><i class="fas fa-user"></i> Información Personal</h6>
                                <p><strong>Nombre:</strong> {{ $cliente->nombre }}</p>
                                <p><strong>Apellido:</strong> {{ $cliente->apellido }}</p>
                                <p><strong>Estado Civil:</strong> {{ $cliente->estado_civil }}</p>
                                <p><strong>DNI:</strong> <span class="badge bg-dark">{{ $cliente->dni_numero }}</span></p>
                            </div>
                            <div class="col-md-6">
                                <h6 class="text-primary"><i class="fas fa-phone"></i> Información de Contacto</h6>
                                <p>
                                    <strong>Email:</strong>
                                    <a href="mailto:{{ $cliente->email }}" class="text-decoration-none">
                                        <i class="fas fa-envelope text-info"></i> {{ $cliente->email }}
                                    </a>
                                </p>
                                <p>
                                    <strong>Teléfono:</strong>
                                    <a href="tel:{{ $cliente->telefono }}" class="text-decoration-none">
                                        <i class="fas fa-phone text-success"></i> {{ $cliente->telefono }}
                                    </a>
                                </p>
                                <p>
                                    <strong>Distrito:</strong> {{ $cliente->distrito->nombre }}<br>
                                    <strong>Provincia:</strong> {{ $cliente->distrito->provincia->nombre }}<br>
                                    <strong>Departamento:</strong> {{ $cliente->distrito->provincia->departamento->nombre }}
                                </p>
                                <p>
                                    <strong>Dirección:</strong> {{ $cliente->direccion }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer d-flex justify-content-end gap-2">
                         <a href="mailto:{{ $cliente->email }}?subject=Consulta&body=Hola%20{{ $cliente->nombre }},"
   class="btn btn-info">
    <i class="fas fa-paper-plane"></i> Enviar Correo
</a>
                        <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <form method="POST" action="{{ route('clientes.destroy', $cliente) }}"
                              onsubmit="return confirm('¿Está seguro de eliminar este cliente?')" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash"></i> Eliminar
                            </button>
                        </form>
                        <a href="{{ route('clientes.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Cancelar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
