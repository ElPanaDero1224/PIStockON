


@extends('plantillas.cabeza2')

@section('css')
    @vite('resources/css/UPDmaterial.css')
@endsection

@section('contenido')


<div class="form-container">
    <form>
        <div class="form-group">
            <label for="product-name">Nombre del producto:</label>
            <input type="text" id="product-name" name="product-name">
        </div>
        <div class="form-group">
            <label for="product-features">Características del producto:</label>
            <input type="text" id="product-features" name="product-features">
        </div>
        <div class="form-group">
            <label>Dimensiones del producto:</label>
            <div class="dimension-inputs">
                <input type="number" placeholder="Ancho" name="width">
                <input type="number" placeholder="Largo" name="length">
                <input type="number" placeholder="Alto" name="height">
            </div>
        </div>
        <div class="form-group">
            <label for="precaution">Medidas de precaución:</label>
            <input type="text" id="precaution" name="precaution">
        </div>
        <div class="form-group">
            <label for="batch-code">Código del lote:</label>
            <input type="text" id="batch-code" name="batch-code">
        </div>
        <div class="form-group">
            <label for="product-price">Precio del producto:</label>
            <input type="number" id="product-price" name="product-price" step="0.01">
        </div>
        <div class="form-group">
            <label for="manufacturer">Fabricante:</label>
            <input type="text" id="manufacturer" name="manufacturer">
        </div>
        <div class="form-group">
            <label for="material">Material:</label>
            <input type="text" id="material" name="material">
        </div>
        <div class="buttons">
            <button type="button" class="cancel-btn">Cancelar</button>
            <button type="submit" class="add-btn">Añadir</button>
        </div>
    </form>
</div>

@endsection