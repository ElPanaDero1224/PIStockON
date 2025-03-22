@extends('plantillas.cabeza2')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@section('contenido')

<div class="card mx-auto m-5" style="max-width: 500px;">
    <div class="card-header text-center">
        <h4>Agregar Puesto</h4>
    </div>

    <form method="POST" action="#" class="p-4">
        @csrf

        <div class="form-group mb-3">
            <label for="nombrePuesto">Nombre del puesto:</label>
            <input type="text" class="form-control" name="nombrePuesto" value="{{ old('nombrePuesto') }}" placeholder="Ingrese el nombre del puesto">
            <small class="text-danger">{{ $errors->first('nombrePuesto') }}</small>
        </div>

        <div class="d-flex justify-content-center gap-3">
            <a href="{{ route('puestos') }}" class="btn btn-danger">
                <strong>Cancelar</strong>
            </a>
            <button type="submit" class="btn" style="background-color:#4CAF50">
                <strong>Añadir</strong>
            </button>
        </div>
    </form>
</div>

<script>
    @if (session('puesto'))
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: '{{ session('puesto') }}',
            confirmButtonText: 'Cerrar',
        });
    @endif
</script>

@endsection