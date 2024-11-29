@extends('plantillas.cabeza2')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@section('contenido')

<div class="card mx-auto m-5" style="max-width: 500px;">
    <div class="card-header text-center">
        <h4>Agregar Material</h4>
    </div>

    <form method="POST" action="{{ route('addmaterial') }}" class="p-4">
        @csrf

        <div class="form-group mb-3">
            <label for="nombreProducto">Nombre del producto:</label>
            <input type="text" class="form-control" name="nombreProducto" value="{{ old('nombreProducto') }}" placeholder="Ingrese el nombre del producto">
            <small class="text-danger">{{ $errors->first('nombreProducto') }}</small>
        </div>

        <div class="form-group mb-3">
            <label for="peso">Peso del producto:</label>
            <input type="text" class="form-control" name="peso" value="{{ old('peso') }}" placeholder="Ingrese el peso del producto">
            <small class="text-danger">{{ $errors->first('peso') }}</small>
        </div>

        <div class="form-group mb-3">
            <label for="caracteristicasProducto">Características del producto:</label>
            <input type="text" class="form-control" name="caracteristicasProducto" value="{{ old('caracteristicasProducto') }}" placeholder="Ingrese las características">
            <small class="text-danger">{{ $errors->first('caracteristicasProducto') }}</small>
        </div>

        <div class="form-group mb-3">
            <label>Dimensiones del producto:</label>
            <div class="row g-2">
                <div class="col">
                    <input type="number" class="form-control" placeholder="Ancho" name="ancho" value="{{ old('ancho') }}">
                    <small class="text-danger">{{ $errors->first('ancho') }}</small>
                </div>
                <div class="col">
                    <input type="number" class="form-control" placeholder="Largo" name="largo" value="{{ old('largo') }}">
                    <small class="text-danger">{{ $errors->first('largo') }}</small>
                </div>
                <div class="col">
                    <input type="number" class="form-control" placeholder="Alto" name="alto" value="{{ old('alto') }}">
                    <small class="text-danger">{{ $errors->first('alto') }}</small>
                </div>
            </div>
        </div>

        <div class="form-group mb-3">
            <label for="precaucion">Medidas de precaución:</label>
            <input type="text" class="form-control" name="precaucion" value="{{ old('precaucion') }}" placeholder="Ingrese medidas de precaución">
            <small class="text-danger">{{ $errors->first('precaucion') }}</small>
        </div>

        <div class="form-group mb-3">
            <label for="codigoLote">Código del lote:</label>
            <input type="text" class="form-control" name="codigoLote" value="{{ old('codigoLote') }}" placeholder="Ingrese el código del lote">
            <small class="text-danger">{{ $errors->first('codigoLote') }}</small>
        </div>

        <div class="form-group mb-3">
            <label for="precio">Precio del producto:</label>
            <input type="number" class="form-control" name="precio" step="0.01" value="{{ old('precio') }}" placeholder="Ingrese el precio">
            <small class="text-danger">{{ $errors->first('precio') }}</small>
        </div>

        <div class="form-group mb-3">
            <label for="fabricante">Fabricante:</label>
            <input type="text" class="form-control" name="fabricante" value="{{ old('fabricante') }}" placeholder="Ingrese el fabricante">
            <small class="text-danger">{{ $errors->first('fabricante') }}</small>
        </div>

        <div class="form-group mb-4">
            <label for="material">Material:</label>
            <input type="text" class="form-control" name="material" value="{{ old('material') }}" placeholder="Ingrese el material">
            <small class="text-danger">{{ $errors->first('material') }}</small>
        </div>

        <div class="d-flex justify-content-center gap-3">
            <a href="{{ route('tabla') }}" class="btn btn-danger">
                <strong>Cancelar</strong>
            </a>
            <button type="submit" class="btn" style="background-color:#4CAF50">
                <strong>Añadir</strong>
            </button>
        </div>
    </form>
</div>

<script>
    @if (session('material'))
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: '{{ session('material') }}',
            confirmButtonText: 'Cerrar',
        });
    @endif
</script>

@endsection
