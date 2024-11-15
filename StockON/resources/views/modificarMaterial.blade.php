


@extends('plantillas.cabeza2')

@section('css')
    @vite('resources/css/UPDmaterial.css')
@endsection

@section('contenido')


<form method="POST" action="{{ route('modMaterial') }}">
    @csrf
    <div class="form-group">
        <label for="nombreProducto">Nombre del producto:</label>
        <input type="text" name="nombreProducto" value="Tornillos">
        <small class="text-danger">{{ $errors->first('nombreProducto') }}</small>
    </div>

    <div class="form-group">
        <label for="caracteristicasProducto">Características del producto:</label>
        <input type="text" name="caracteristicasProducto" value="Se trata de un producto diseñado para...">
        <small class="text-danger">{{ $errors->first('caracteristicasProducto') }}</small>
    </div>

    <div class="form-group">
        <label>Dimensiones del producto:</label>
        <div class="dimension-inputs">
            <input type="number" placeholder="Ancho" name="ancho" value="12">
            <small class="text-danger">{{ $errors->first('ancho') }}</small>
            <input type="number" placeholder="Largo" name="largo" value="45">
            <small class="text-danger">{{ $errors->first('largo') }}</small>
            <input type="number" placeholder="Alto" name="alto" value="12">
            <small class="text-danger">{{ $errors->first('alto') }}</small>
        </div>
    </div>

    <div class="form-group">
        <label for="precaucion">Medidas de precaución:</label>
        <input type="text" name="precaucion" value="Producto altamente inflamable">
        <small class="text-danger">{{ $errors->first('precaucion') }}</small>
    </div>

    <div class="form-group">
        <label for="codigoLote">Código del lote:</label>
        <input type="text" name="codigoLote" value="121231231">
        <small class="text-danger">{{ $errors->first('codigoLote') }}</small>
    </div>

    <div class="form-group">
        <label for="precio">Precio del producto:</label>
        <input type="number" name="precio" step="0.01" value="50">
        <small class="text-danger">{{ $errors->first('precio') }}</small>
    </div>

    <div class="form-group">
        <label for="fabricante">Fabricante:</label>
        <input type="text" name="fabricante" value="CAT">
        <small class="text-danger">{{ $errors->first('fabricante') }}</small>
    </div>

    <div class="form-group">
        <label for="material">Material:</label>
        <input type="text" name="material" value="Liquido">
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