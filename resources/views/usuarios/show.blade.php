@extends('base.base')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Detalles del Usuario: {{ $usuario->name }}</h5>
        </div>
        <div class="card-body">
            <p><strong>Email:</strong> {{ $usuario->email }}</p>
            <p><strong>Registrado:</strong> {{ $usuario->created_at->format('d/m/Y H:i') }}</p>
            <a href="{{ route('usuarios.edit', $usuario) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
@endsection
