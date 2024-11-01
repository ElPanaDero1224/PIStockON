


@extends('plantillas.cabeza2')

@section('css')
    @vite('resources/css/UPDmaterial.css')
@endsection

@section('contenido')


<div class="form-container">
    <form>
        <div class="form-group">
            <label for="nproveedor">Nombre del proveedor:</label>
            <input type="text" name="nproveedor">
        </div>
        <div class="form-group">
            <label for="numtelefono">Numero de telefono:</label>
            <input type="number" name="numtelefono">
        </div>

        <div class="form-group">
            <label for="correo">Correo electronico:</label>
            <input type="text" name="correo">
        </div>
        <div class="form-group">
            <label for="tipoproducto">Tipos de productos suministraods:</label>
            <input type="text" name="tipoproducto">
        </div>
        <div class="form-group">
            <label for="condicionesPago">Condiciones de pago:</label>
            <input type="number"name="condicionesPago" step="0.01">
        </div>
        <div class="form-group">
            <label for="freSuministro">Frecuencia del suministro:</label>
            <input type="text" name="freSuministro">
        </div>
        <div class="form-group">
            <label for="horario">Horario de atencion:</label>
            <input type="text" name="horario">
        </div>
        <div class="form-group">
            <label for="pais">Pais:</label>
            <input type="text" name="pais">
        </div>
        <div class="form-group">
            <label for="ciudad">Ciudad:</label>
            <input type="text" name="ciudad">
        </div>
        <div class="buttons">
            <a href="{{ route('proveedores') }}" class="btn btn-primary" style="background-color: #fa6a6af7; color: rgb(0, 0, 0); border: none; padding: 10px 20px; border-radius: 5px;">
                <strong>cancelar</strong>
            </a>
            <button type="submit" class="add-btn">Añadir</button>
        </div>
    </form>
</div>

@endsection