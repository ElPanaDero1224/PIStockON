@extends('plantillas.cabeza2')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@section('contenido')

<div class="card mx-auto m-5" style="max-width: 500px;">
    <div class="card-header text-center">
        <h4>Agregar Producto</h4>
    </div>

    <form method="POST" action="#" class="p-4">
        @csrf

        <div class="form-group mb-3">
            <label for="nombre">Nombre del producto:</label>
            <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" placeholder="Ingrese el nombre del producto">
            <small class="text-danger">{{ $errors->first('nombre') }}</small>
        </div>

        <div class="form-group mb-3">
            <label for="precioUnitario">Precio unitario:</label>
            <input type="number" class="form-control" name="precioUnitario" step="0.01" value="{{ old('precioUnitario') }}" placeholder="Ingrese el precio unitario">
            <small class="text-danger">{{ $errors->first('precioUnitario') }}</small>
        </div>

        <div class="form-group mb-3">
            <label for="dimensiones">Dimensiones del producto:</label>
            <textarea class="form-control" name="dimensiones" placeholder="Ingrese las dimensiones">{{ old('dimensiones') }}</textarea>
            <small class="text-danger">{{ $errors->first('dimensiones') }}</small>
        </div>

        <div class="form-group mb-3">
            <label for="precauciones">Precauciones:</label>
            <textarea class="form-control" name="precauciones" placeholder="Ingrese las precauciones">{{ old('precauciones') }}</textarea>
            <small class="text-danger">{{ $errors->first('precauciones') }}</small>
        </div>

        <div class="form-group mb-3">
            <label for="cantidad">Cantidad:</label>
            <input type="number" class="form-control" name="cantidad" value="{{ old('cantidad') }}" placeholder="Ingrese la cantidad">
            <small class="text-danger">{{ $errors->first('cantidad') }}</small>
        </div>

        <div class="form-group mb-3">
            <label for="caracteristicas">Características del producto:</label>
            <textarea class="form-control" name="caracteristicas" placeholder="Ingrese las características">{{ old('caracteristicas') }}</textarea>
            <small class="text-danger">{{ $errors->first('caracteristicas') }}</small>
        </div>

        <div class="form-group mb-3">
            <label for="codigoLote">Código del lote:</label>
            <input type="text" class="form-control" name="codigoLote" value="{{ old('codigoLote') }}" placeholder="Ingrese el código del lote">
            <small class="text-danger">{{ $errors->first('codigoLote') }}</small>
        </div>

        <div class="form-group mb-3">
            <label for="material">Material:</label>
            <input type="text" class="form-control" name="material" value="{{ old('material') }}" placeholder="Ingrese el material">
            <small class="text-danger">{{ $errors->first('material') }}</small>
        </div>

        <div class="form-group mb-3">
            <label for="id_inventario">ID Inventario:</label>
            <input type="number" class="form-control" name="id_inventario" value="{{ old('id_inventario') }}" placeholder="Ingrese el ID del inventario">
            <small class="text-danger">{{ $errors->first('id_inventario') }}</small>
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
    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: '{{ session('success') }}',
            confirmButtonText: 'Cerrar',
        });
    @endif
</script>

@endsection