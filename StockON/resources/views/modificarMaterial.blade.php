


@extends('plantillas.cabeza2')

@section('css')
    @vite('resources/css/UPDmaterial.css')
@endsection

@section('contenido')


<form method="POST" action="{{ route('modMaterial', $material->materialID) }}">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="nombreProducto">Nombre del producto:</label>
        <input type="text" name="nombreProducto" value="{{$material->nombre}}">
        <small class="text-danger">{{ $errors->first('nombreProducto') }}</small>
    </div>

    <div class="form-group">
        <label for="peso">Peso del producto:</label>
        <input type="text" name="peso" value="{{ $material->peso }}">
        <small class="text-danger">{{ $errors->first('peso') }}</small>
    </div>

    <div class="form-group">
        <label for="caracteristicasProducto">Características del producto:</label>
        <input type="text" name="caracteristicasProducto" value="{{$material->caracteristicas}}">
        <small class="text-danger">{{ $errors->first('caracteristicasProducto') }}</small>
    </div>

    <div class="form-group">
        <label>Dimensiones del producto:</label>
        <div class="dimension-inputs">
            <input type="number" placeholder="Ancho" name="ancho" value="{{$material->ancho}}">
            <small class="text-danger">{{ $errors->first('ancho') }}</small>
            <input type="number" placeholder="Largo" name="largo" value="{{$material->largo}}">
            <small class="text-danger">{{ $errors->first('largo') }}</small>
            <input type="number" placeholder="Alto" name="alto" value="{{$material->alto}}">
            <small class="text-danger">{{ $errors->first('alto') }}</small>
        </div>
    </div>

    <div class="form-group">
        <label for="precaucion">Medidas de precaución:</label>
        <input type="text" name="precaucion" value="{{$material->precaucion}}">
        <small class="text-danger">{{ $errors->first('precaucion') }}</small>
    </div>

    <div class="form-group">
        <label for="codigoLote">Código del lote:</label>
        <input type="text" name="codigoLote" value="{{$material->codigoLote}}">
        <small class="text-danger">{{ $errors->first('codigoLote') }}</small>
    </div>

    <div class="form-group">
        <label for="precio">Precio del producto:</label>
        <input type="number" name="precio" step="0.01" value="{{$material->precio}}">
        <small class="text-danger">{{ $errors->first('precio') }}</small>
    </div>

    <div class="form-group">
        <label for="fabricante">Fabricante:</label>
        <input type="text" name="fabricante" value="{{$material->fabricante}}">
        <small class="text-danger">{{ $errors->first('fabricante') }}</small>
    </div>

    <div class="form-group">
        <label for="material">Material:</label>
        <input type="text" name="material" value="{{$material->material}}">
        <small class="text-danger">{{ $errors->first('material') }}</small>
    </div>

    <div class="buttons">
        <a href="{{ route('tabla') }}" class="btn btn-primary" style="background-color: #fa6a6af7; color: rgb(0, 0, 0); border: none; padding: 10px 20px; border-radius: 5px;">
            <strong>cancelar</strong>
        </a>
        <button type="submit" class="btn" style="background-color:#afcae3">
            <strong>Actualizar</strong>
        </button> 
    </div>
</form>


@endsection 