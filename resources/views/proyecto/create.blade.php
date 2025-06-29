@extends('base.base')
@section('content')
    <form class="needs-validation" method="post" action="{{ route('proyecto_store') }}">
        <div class="card">
            <div class="card-header">Crear Nuevo Proyecto</div>
            <div class="card-body">

                @csrf
                <label>Cantidad</label>
                <input class="form-control" type="number" name="cantidad" required>
                <label>Foto del Plano</label>
                <input type="text" name="foto_plano">
                <label>Fecha de creación</label>
                <input type="date" name="fecha_creacion">
                <label>Áreas verdes</label>
                <input type="text" name="areas_verdes">
                <label>Nombre</label>
                <input type="text" name="nombre">
                <label>descripción</label>
                <input type="text" name="descripcion">


            </div>
            <div class="card-footer">
                <div class="btn btn-group">
                    <a href="{{ route('proyecto_listar') }}" class="btn btn-secondary">Volver</a>
                    <button class="btn btn-primary" type="subtim">Enviar</button>

                </div>

            </div>
        </div>
    </form>
@endsection
