@extends('base.base')
@section('content')
    <div>
        <h1>Editar proyecto</h1>
    </div>
    <div class="card">
        <div class="card-body">
            <form method="post" action="/proyectos/update/{{$proyecto->id}}">
                @csrf
                <label>Cantidad</label>
                <input type="text" name="cantidad" value="{{$proyecto->cantidad}}">
                <label>Foto del Plano</label>
                <input type="text" name="foto_plano" value="{{$proyecto->foto_plano}}">
                <label>Fecha de creación</label>
                <input type="text" name="fecha_creacion" value="{{$proyecto->fecha_creacion}}">
                <label>Áreas verdes</label>
                <input type="text" name="areas_verdes" value="{{$proyecto->areas_verdes}}">
                <label>Nombre</label>
                <input type="text" name="nombre" value="{{$proyecto->nombre}}">
                <label>descripción</label>
                <input type="text" name="descripcion" value="{{$proyecto->descripcion}}">
                <button type="subtim">Enviar</button>
            </form>
        </div>
    </div>
@endsection
