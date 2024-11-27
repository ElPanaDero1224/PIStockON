@extends('plantillas.cabeza2')

@section('css')
    @vite('resources/css/UPDmaterial.css')
@endsection

@section('contenido')

<div class="form-container">
    <h2>Modificar Proveedor</h2>
    <form action="{{ route('actualizarProveedor', $proveedores->proveedorID) }}" method="POST">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="nproveedor">Nombre del proveedor:</label>
            <input type="text" name="nproveedor" value="{{ $proveedores->nombre }}">
            <small class="text-danger">{{ $errors->first('nproveedor') }}</small>
        </div>
        
        <div class="form-group">
            <label for="numtelefono">Número de teléfono:</label>
            <input type="text" name="numtelefono" value="{{ $proveedores->numTelefono}}">
            <small class="text-danger">{{ $errors->first('numtelefono') }}</small>
        </div>

        <div class="form-group">
            <label for="correo">Correo electrónico:</label>
            <input type="text" name="correo" value="{{$proveedores->correo}}">
            <small class="text-danger">{{ $errors->first('correo') }}</small>
        </div>

        <div class="form-group">
            <label for="tipoproducto">Tipos de productos suministrados:</label>
            <input type="text" name="tipoproducto" value="{{$proveedores->tiposProducto}}">
            <small class="text-danger">{{ $errors->first('tipoproducto') }}</small>
        </div>

        <div class="form-group">
            <label for="condicionesPago">Condiciones de pago:</label>
            <input type="text" name="condicionesPago" value="{{$proveedores->condicionesPago }}">
            <small class="text-danger">{{ $errors->first('condicionesPago') }}</small>
        </div>

        <div class="form-group">
            <label for="freSuministro">Frecuencia del suministro:</label>
            <input type="text" name="freSuministro" value="{{$proveedores->frecuenciaSuministro}}">
            <small class="text-danger">{{ $errors->first('freSuministro') }}</small>
        </div>

        <div class="form-group">
            <label for="horario">Horario de atención:</label>
            <input type="text" name="horario" value="{{$proveedores->horarioAtencion}}">
            <small class="text-danger">{{ $errors->first('horario') }}</small>
        </div>

        <div class="form-group">
            <label for="pais">País:</label>
            <input type="text" name="pais" value="{{$proveedores->pais}}">
            <small class="text-danger">{{ $errors->first('pais') }}</small>
        </div>

        <div class="form-group">
            <label for="ciudad">Ciudad:</label>
            <input type="text" name="ciudad" value="{{$proveedores->ciudad }}">
            <small class="text-danger">{{ $errors->first('ciudad') }}</small>
        </div>

        <div class="buttons">
            <a href="{{ route('proveedores') }}" class="btn btn-primary" style="background-color: #fa6a6af7; color: rgb(0, 0, 0); border: none; padding: 10px 20px; border-radius: 5px;">
                <strong>Cancelar</strong>
            </a>
            <button type="submit" class="add-btn">Modificar</button>
        </div>
    </form>
</div>

@endsection
