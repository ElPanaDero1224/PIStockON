@extends('plantillas.cabeza2')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@section('contenido')

<div class="card mx-auto  m-5" style="max-width: 500px;">

    <div class="card-header text-center">
        <h4>Agregar Inventario</h4>
    </div>

    <form method="POST" action="{{ route('store_inventario') }}" class="p-4">
        @csrf

        <div class="form-group mb-3">
            <label for="nombreInventario">Nombre del Inventario:</label>
            <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" placeholder="Ingrese el nombre del inventario">
            <small class="text-danger">{{ $errors->first('nombre') }}</small>
        </div>

        <div class="form-group mb-3">
            <label for="id_tipoInventario">Tipo de Inventario:</label>
            <select class="form-control" name="id_tipoInventario">
                @foreach($tipo_inventario as $tipo)
                    <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                @endforeach
            </select>
            <small class="text-danger">{{ $errors->first('id_tipoInventario') }}</small>
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
    @if (session('inventario'))
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: '{{ session('inventario') }}',
            confirmButtonText: 'Cerrar',
        });
    @endif
</script>

@endsection