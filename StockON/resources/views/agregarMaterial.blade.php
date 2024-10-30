


@extends('plantillas.cabeza2')

@section('css')
    @vite('resources/css/UPDmaterial.css')
@endsection

@section('contenido')


<div class="form-container">
    <form>
        <div class="form-group">
            <label for="nombreProducto">Nombre del producto:</label>
            <input type="text" name="nombreProducto">
        </div>

        <div class="form-group">
            <label for="caracteristicasProducto">Características del producto:</label>
            <input type="text" name="caracteristicasProducto">
        </div>

        <div class="form-group">
            <label>Dimensiones del producto:</label>
            <div class="dimension-inputs">
                <input type="number" placeholder="Ancho" name="ancho">
                <input type="number" placeholder="Largo" name="largo">
                <input type="number" placeholder="Alto" name="alto">
            </div>
        </div>

        <div class="form-group">
            <label for="precaucion">Medidas de precaución:</label>
            <input type="text" name="precaucion">
        </div>

        <div class="form-group">
            <label for="codigoLote">Código del lote:</label>
            <input type="text" name="codigoLote">
        </div>

        <div class="form-group">
            <label for="precio">Precio del producto:</label>
            <input type="number" name="precio" step="0.01">
        </div>
        <div class="form-group">
            <label for="fabricante">Fabricante:</label>
            <input type="text" name="fabricante">
        </div>
        <div class="form-group">
            <label for="material">Material:</label>
            <input type="text" name="material">
        </div>
        <div class="buttons">
            <button type="button" class="cancel-btn">Cancelar</button>
            <button type="submit" class="add-btn">Añadir</button>
        </div>
    </form>
</div>

@endsection