@extends('base.base')
@section('content')
    <form class="needs-validation" method="post" action="{{ route('lote_update',$lote) }}">

        <div class="card">
            <div class="card-header">Editar Lote</div>
            <div class="card-body">
                    @csrf
                    <label for="">Precio</label>
                    <input type="number" name="precio" value="{{$lote->precio}}">
                    <label for="">Limite del Sur</label>
                    <input type="number" name="limite_sur" value="{{$lote->limite_sur}}">
                    <label for="">Limite del Norte</label>
                    <input type="number" name="limite_norte" value="{{$lote->limite_norte}}">
                    <label for="">Limite del Este</label>
                    <input type="number" name="limite_este" value="{{$lote->limite_este}}">
                    <label for="">Limite del Oeste</label>
                    <input type="number" name="limite_oeste" value="{{$lote->limite_oeste}}">
                    <label for="">Manzana</label>
                    <input type="text" name="manzana" value="{{$lote->manzana}}">
                    <label for="">Sector</label>
                    <input type="text" name="sector" value="{{$lote->sector}}">
                    <label for="">Numero de Lote</label>
                    <input type="number" name="nro_lote" value="{{$lote->nro_lote}}">
                    <label for="">Perimetro</label>
                    <input type="number" name="perimetro" value="{{$lote->perimetro}}">
                    <label for="">Area</label>
                    <input type="number" name="area" value="{{$lote->area}}">
                    <button type="subtim">Enviar</button>
            </div>
        </div>
    </form>
@endsection
