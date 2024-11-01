


@extends('plantillas.cabeza2')

@section('css')
    @vite('resources/css/UPDmaterial.css')
@endsection

@section('contenido')


<form method="POST" action="{{ route('addmaterial') }}">
    @csrf
    <div class="form-group">
        <label for="nombreProducto">Nombre del producto:</label>
        <input type="text" name="nombreProducto" value="{{ old('nombreProducto') }}">
        <small class="text-danger">{{ $errors->first('nombreProducto') }}</small>
    </div>

    <div class="form-group">
        <label for="caracteristicasProducto">Características del producto:</label>
        <input type="text" name="caracteristicasProducto" value="{{ old('caracteristicasProducto') }}">
        <small class="text-danger">{{ $errors->first('caracteristicasProducto') }}</small>
    </div>

    <div class="form-group">
        <label>Dimensiones del producto:</label>
        <div class="dimension-inputs">
            <input type="number" placeholder="Ancho" name="ancho" value="{{ old('ancho') }}">
            <small class="text-danger">{{ $errors->first('ancho') }}</small>
            <input type="number" placeholder="Largo" name="largo" value="{{ old('largo') }}">
            <small class="text-danger">{{ $errors->first('largo') }}</small>
            <input type="number" placeholder="Alto" name="alto" value="{{ old('alto') }}">
            <small class="text-danger">{{ $errors->first('alto') }}</small>
        </div>
    </div>

    <div class="form-group">
        <label for="precaucion">Medidas de precaución:</label>
        <input type="text" name="precaucion" value="{{ old('precaucion') }}">
        <small class="text-danger">{{ $errors->first('precaucion') }}</small>
    </div>

    <div class="form-group">
        <label for="codigoLote">Código del lote:</label>
        <input type="text" name="codigoLote" value="{{ old('codigoLote') }}">
        <small class="text-danger">{{ $errors->first('codigoLote') }}</small>
    </div>

    <div class="form-group">
        <label for="precio">Precio del producto:</label>
        <input type="number" name="precio" step="0.01" value="{{ old('precio') }}">
        <small class="text-danger">{{ $errors->first('precio') }}</small>
    </div>

    <div class="form-group">
        <label for="fabricante">Fabricante:</label>
        <input type="text" name="fabricante" value="{{ old('fabricante') }}">
        <small class="text-danger">{{ $errors->first('fabricante') }}</small>
    </div>

    <div class="form-group">
        <label for="material">Material:</label>
        <input type="text" name="material" value="{{ old('material') }}">
        <small class="text-danger">{{ $errors->first('material') }}</small>
    </div>

    <div class="buttons">
        <a href="{{ route('tabla') }}" class="btn btn-primary" style="background-color: #fa6a6af7; color: rgb(0, 0, 0); border: none; padding: 10px 20px; border-radius: 5px;">
            <strong>cancelar</strong>
        </a>
        <button type="submit" class="add-btn">Añadir</button>
    </div>
</form>


@endsection