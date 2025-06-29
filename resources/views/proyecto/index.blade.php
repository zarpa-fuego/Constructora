@extends('base.base')
@section('content')
    <div class="container-fluid py-4">


        <div>
            <h1>Gestión de proyectos</h1>
            <a href="{{ route('proyecto_crear') }}" class="btn btn-primary">Agregar</a>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Cantidad</td>
                        <td>Foto del Plano</td>
                        <td>Fecha de creación</td>
                        <td>Áreas verdes</td>
                        <td>Nombre</td>
                        <td>Descripción</td>
                        <td>Opciones</td>
                    </tr>
                    @foreach($proyectos as $proyecto)
                        <tr>
                            <td>{{ $proyecto->cantidad }}</td>
                            <td>{{ $proyecto->foto_plano }}</td>
                            <td>{{ $proyecto->fecha_creacion }}</td>
                            <td>{{ $proyecto->areas_verdes }}</td>
                            <td>{{ $proyecto->nombre }}</td>
                            <td>{{ $proyecto->descripcion }}</td>
                            <td>
                                <a href="{{route('lote_index', $proyecto )}}">Gestion</a>
                                <a href="/proyectos/edit/{{$proyecto->id}}">Editar</a>

                                <a href="{{route('proyecto_eliminar',$proyecto->id )}}">Eliminar</a>

                            </td>
                        </tr>
                    @endforeach

            </table>
        </div>
    </div>
    </div>


@endsection
