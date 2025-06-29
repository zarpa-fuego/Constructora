@extends('base.base')
@section('content')
    <form class="needs-validation" method="post" action="{{ route('lote_store',$proyecto) }}">
        <div class="card">
            <div class="card-header">Crear Nuevo Lote</div>
            <div class="card-body">
                @csrf
                <label for="">Precio</label>
                <input type="number" name="precio" required>
                <label for="">Limite del Sur</label>
                <input type="number" name="limite_sur">
                <label for="">Limite del Norte</label>
                <input type="number" name="limite_norte">
                <label for="">Limite del Este</label>
                <input type="number" name="limite_este">
                <label for="">Limite del Oeste</label>
                <input type="number" name="limite_oeste">
                <label for="">Manzana</label>
                <input type="text" name="manzana">
                <label for="">Sector</label>
                <input type="text" name="sector">
                <label for="">Numero de Lote</label>
                <input type="number" name="nro_lote">
                <label for="">Perimetro</label>
                <input type="number" name="perimetro">
                <label for="">Area</label>
                <input type="number" name="area">
            </div>
            <div class="card-footer">
                <div class="btn btn-group">
                    <button class="btn btn-primary" type="subtim">Enviar</button>
                </div>
            </div>
        </div>
    </form>
@endsection
