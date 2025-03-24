@extends('plantillas.cabeza2')

@section('contenido')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="card mx-auto m-5" style="max-width: 800px;">
    <div class="card-header text-center">
        <h4>Actualizar Producto</h4>
    </div>

    <form method="POST" action="{{ route('update_productos', ['id_inventario' => $id_inventario, 'id' => $producto->id]) }}" class="p-4">
        @csrf
        @method('PUT')

        <div class="row">
            <!-- Columna Izquierda -->
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" value="{{ old('nombre', $producto->nombre) }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="precioUnitario">Precio Unitario:</label>
                    <input type="number" step="0.01" class="form-control" name="precioUnitario" value="{{ old('precioUnitario', $producto->precioUnitario) }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="cantidad">Cantidad:</label>
                    <input type="number" class="form-control" name="cantidad" value="{{ old('cantidad', $producto->cantidad) }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="codigoLote">Código de Lote:</label>
                    <input type="text" class="form-control" name="codigoLote" value="{{ old('codigoLote', $producto->codigoLote) }}" required>
                </div>
            </div>

            <!-- Columna Derecha -->
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="dimensiones">Dimensiones:</label>
                    <textarea class="form-control" name="dimensiones">{{ old('dimensiones', $producto->dimensiones) }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="precauciones">Precauciones:</label>
                    <textarea class="form-control" name="precauciones">{{ old('precauciones', $producto->precauciones) }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="caracteristicas">Características:</label>
                    <textarea class="form-control" name="caracteristicas">{{ old('caracteristicas', $producto->caracteristicas) }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="material">Material:</label>
                    <textarea class="form-control" name="material">{{ old('material', $producto->material) }}</textarea>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center gap-3 mt-4">
            <a href="{{ route('tabla', ['id_inventario' => $id_inventario]) }}" class="btn btn-danger">
                <strong>Cancelar</strong>
            </a>
            <button type="submit" class="btn btn-primary">
                <strong>Actualizar Producto</strong>
            </button>
        </div>
    </form>
</div>

<!-- Mostrar errores de validación -->
@if($errors->any())
<script>
    Swal.fire({
        icon: 'error',
        title: 'Error de validación',
        html: `@foreach($errors->all() as $error)<p>{{ $error }}</p>@endforeach`,
        confirmButtonText: 'Entendido'
    });
</script>
@endif

<!-- Mostrar mensajes de éxito -->
@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: '¡Éxito!',
        text: '{{ session('success') }}',
        confirmButtonText: 'Cerrar'
    });
</script>
@endif
@endsection