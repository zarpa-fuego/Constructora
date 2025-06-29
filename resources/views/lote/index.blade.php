@extends('base.base')
@section('content')
    <div class="container-fluid py-4">
        <div>
            <h1>Gestión de lotes</h1>
            <a href="{{ route('lote_crear', $proyecto->id) }}" class="btn btn-primary">Agregar</a>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Precio</td>
                        <td>Límite del Sur</td>
                        <td>Límite del Norte</td>
                        <td>Límite del Este</td>
                        <td>Límite del Oeste</td>
                        <td>Proyecto</td>
                        <td>Manzana</td>
                        <td>Sector</td>
                        <td>Número de Lote</td>
                        <td>Estado</td>
                        <td>Fecha de Vendido</td>
                        <td>Perímetro</td>
                        <td>Área</td>
                        <td>Opciones</td>
                    </tr>
                    @foreach($lotes as $lote)
                        <tr>
                            <td>{{ $lote->precio }}</td>
                            <td>{{ $lote->limite_sur }}</td>
                            <td>{{ $lote->limite_norte }}</td>
                            <td>{{ $lote->limite_este }}</td>
                            <td>{{ $lote->limite_oeste }}</td>
                            <td>{{ $lote->proyecto->nombre }}</td>
                            <td>{{ $lote->manzana }}</td>
                            <td>{{ $lote->sector }}</td>
                            <td>{{ $lote->nro_lote }}</td>
                            <td>{{ $lote->estado }}</td>
                            <td>{{ $lote->fecha_vendido }}</td>
                            <td>{{ $lote->perimetro }}</td>
                            <td>{{ $lote->area }}</td>
                            <td>
                                <a href="/lotes/show/{{$lote->id}}">Ver</a>
                                <a href="/lotes/edit/{{$lote->id}}">Editar</a>
                                <a href="/lotes/destroy/{{$lote->id}}">Eliminar</a>

                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>


@endsection
