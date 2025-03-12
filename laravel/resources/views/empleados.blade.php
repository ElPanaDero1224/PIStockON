@extends('plantillas.cabeza2')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

    @if (session('empleado'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: '{{ session('empleado') }}',
            confirmButtonText: 'Cerrar',
        });
    </script>
    @endif

    <div style="margin: 20px 0; display: flex; justify-content: flex-start;">
        <a href="{{ route('agregarEmpleado') }}" class="btn btn-primary" style="background-color: #7fff7dc5; color: rgb(0, 0, 0); border: none; padding: 10px 20px; border-radius: 5px; margin-right: 10px;">
            Agregar empleado
        </a>
        <a href="{{ route('categorias') }}" class="btn btn-primary" style="background-color: #a0de53a1; color: rgb(0, 0, 0); border: none; padding: 10px 20px; border-radius: 5px;">
            Ver categorías
        </a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Categoría</th>
                <th colspan="2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($consultarEmpleados as $empleado)
            <tr>
                <td>{{ $empleado->nombre }}</td>
                <td>{{ $empleado->apellido }}</td>
                <td>{{ $empleado->correo }}</td>
                <td>{{ $empleado->numTelefono }}</td>
                <td>{{ $empleado->ncategoria ?? 'Sin cargo' }}</td>
                <td>
                    <!-- Formulario de eliminación -->
                    <form id="form-eliminar-{{ $empleado->empleadoID }}" action="{{ route('rutaEliminarEmpleado', $empleado->empleadoID) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>

                    <!-- Botón para confirmar eliminación -->
                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmarEliminacion({{ $empleado->empleadoID }})">
                        {{ __('Eliminar') }}
                    </button>

                    <!-- Botón para modificar -->
                    <a href="{{ route('verModEmpleado', $empleado->empleadoID) }}" class="btn btn-primary" style="background-color: #98dbdbf7; color: rgb(0, 0, 0); border: none; padding: 10px 20px; border-radius: 5px;">
                        <strong>Modificar</strong>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
