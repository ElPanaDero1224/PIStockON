@extends('plantillas.cabeza2')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@section('contenido')


<div class="card mx-auto  m-5" style="max-width: 500px;">

    <div class="card-header text-center">
        <h4>Modificar Categoria</h4>
    </div>

    <form method="POST" action="{{ route('modificarCategoria') }}" class="p-4">
        @csrf

        <div class="form-group mb-3">
            <label for="nombreEmpleado">Nombre de la categoria:</label>
            <input type="text" class="form-control" name="nombreCategoria" value="Desarrollador" placeholder="Ingrese el nombre de la categoría">
            <small class="text-danger">{{ $errors->first('nombreCategoria') }}</small>
        </div>
        

        <div class="d-flex justify-content-center gap-3">
            <a href="{{route('categorias')}}" class="btn btn-danger">
                <strong>Cancelar</strong>
            </a>
            <button type="submit" class="btn" style="background-color:#afcae3">
                <strong>Actualizar</strong>
            </button>
        </div>
    </form>
</div>

<script>
    
    @if (session('categoria'))
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: '{{ session('categoria') }}',
                confirmButtonText: 'Cerrar',
            });
    @endif
</script>

@endsection
