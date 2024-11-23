@extends('plantillas.cabeza2')

<script>
    function confirmarEliminacion(id) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "No podrás revertir esto.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(`form-eliminar-${id}`).submit();
            }
        });
    }
</script>


@section('contenido')

<div style="margin: 20px 0; display: flex; justify-content: flex-start;">
    <a href="{{ route('formularioCategoria') }}" class="btn btn-primary" style="background-color: #7fff7dc5; color: rgb(0, 0, 0); border: none; padding: 10px 20px; border-radius: 5px; margin-right: 10px;">
        Agregar Categoria
    </a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>Nombre de la categoria</th>
            <th colspan="2">Acciones</th>
        </tr>
    </thead>

    <tbody>
        
        @foreach($consultaCategoria as $categoria)
        <tr>
            <td>{{$categoria->nombre}}</td>
            <td>
                <a href="{{ route('verModificarCategorias', $categoria->categoriaID) }}" class="btn btn-primary" style="background-color: #98dbdbf7; color: rgb(0, 0, 0); border: none; padding: 10px 20px; border-radius: 5px;">
                    <strong>Modificar</strong>
                </a>

                <form id="form-eliminar-{{ $categoria->categoriaID }}" action="{{ route('rutaEliminarCategoria', $categoria->categoriaID) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
                <button type="button" class="btn btn-danger btn-sm" onclick="confirmarEliminacion({{ $categoria->categoriaID }})">
                    {{ __('Eliminar') }}
                </button>
            </td>
        </tr>
        @endforeach

        @if (session('categoria'))
        <script>
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: '{{ session('categoria') }}',
            confirmButtonText: 'Cerrar',
        });
        </script>
        @endif
    
    </tbody>
</table>



@endsection
