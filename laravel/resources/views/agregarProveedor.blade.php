@extends('plantillas.cabeza2')

@section('css')
    @vite('resources/css/UPDmaterial.css')
@endsection

@section('contenido')

<div class="card mx-auto my-5" style="max-width: 800px; padding: 20px;">
    <div class="card-header text-center">
        <h4>Registro de Proveedor</h4>
    </div>

    <form action="{{ route('addProveedor') }}" method="POST" class="p-4">
        @csrf

        <div class="form-group mb-3">
            <label for="nproveedor">Nombre del proveedor:</label>
            <input type="text" class="form-control" name="nproveedor" value="{{ old('nproveedor') }}" placeholder="Ingrese el nombre del proveedor">
            <small class="text-danger">{{ $errors->first('nproveedor') }}</small>
        </div>

        <div class="form-group mb-3">
            <label for="numtelefono">Número de teléfono:</label>
            <input type="text" class="form-control" name="numtelefono" value="{{ old('numtelefono') }}" placeholder="Ingrese el número de teléfono">
            <small class="text-danger">{{ $errors->first('numtelefono') }}</small>
        </div>

        <div class="form-group mb-3">
            <label for="correo">Correo electrónico:</label>
            <input type="email" class="form-control" name="correo" value="{{ old('correo') }}" placeholder="Ingrese el correo electrónico">
            <small class="text-danger">{{ $errors->first('correo') }}</small>
        </div>

        <div class="form-group mb-3">
            <label for="tipoproducto">Tipos de productos suministrados:</label>
            <input type="text" class="form-control" name="tipoproducto" value="{{ old('tipoproducto') }}" placeholder="Ingrese los tipos de productos">
            <small class="text-danger">{{ $errors->first('tipoproducto') }}</small>
        </div>

        <div class="form-group mb-3">
            <label for="condicionesPago">Condiciones de pago:</label>
            <input type="text" class="form-control" name="condicionesPago" value="{{ old('condicionesPago') }}" placeholder="Ingrese las condiciones de pago">
            <small class="text-danger">{{ $errors->first('condicionesPago') }}</small>
        </div>

        <div class="form-group mb-3">
            <label for="freSuministro">Frecuencia del suministro:</label>
            <input type="text" class="form-control" name="freSuministro" value="{{ old('freSuministro') }}" placeholder="Ingrese la frecuencia del suministro">
            <small class="text-danger">{{ $errors->first('freSuministro') }}</small>
        </div>

        <div class="form-group mb-3">
            <label for="horario">Horario de atención:</label>
            <input type="text" class="form-control" name="horario" value="{{ old('horario') }}" placeholder="Ingrese el horario de atención">
            <small class="text-danger">{{ $errors->first('horario') }}</small>
        </div>

        <div class="form-group mb-3">
            <label for="pais">País:</label>
            <input type="text" class="form-control" name="pais" value="{{ old('pais') }}" placeholder="Ingrese el país">
            <small class="text-danger">{{ $errors->first('pais') }}</small>
        </div>

        <div class="form-group mb-3">
            <label for="ciudad">Ciudad:</label>
            <input type="text" class="form-control" name="ciudad" value="{{ old('ciudad') }}" placeholder="Ingrese la ciudad">
            <small class="text-danger">{{ $errors->first('ciudad') }}</small>
        </div>

        <div class="d-flex justify-content-center gap-3">
            <a href="{{ route('proveedores') }}" class="btn btn-danger">
                <strong>Cancelar</strong>
            </a>
            <button type="submit" class="btn btn-primary">
                <strong>Añadir</strong>
            </button>
        </div>
    </form>
</div>

@endsection
