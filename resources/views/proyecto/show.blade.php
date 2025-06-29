@extends('base.base')
@section('content')
    <div>
        <h1>Ver proyecto</h1>
    </div>
    <div class="card">
        <div class="card-body">
            {{ $proyecto->cantidad }}
            {{ $proyecto->foto_plano }}
            {{ $proyecto->fecha_creacion }}
            {{ $proyecto->areas_verdes }}
            {{ $proyecto->nombre }}
            {{ $proyecto->descripcion }}
        </div>
    </div>


@endsection
