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
                document.getElementById(`form-eliminar-${id}`).submit(); // Aquí usamos el parámetro id correctamente
            }
        });
    }
</script>

@section('css')
    @vite('resources/css/tabla.css')
@endsection


@section('contenido')
    <div style="margin: 20px 0; display: flex; justify-content: flex-start;">
        <a href="{{ route('agregarMaterial') }}" class="btn btn-primary" style="background-color: #7fff7dc5; color: rgb(0, 0, 0); border: none; padding: 10px 20px; border-radius: 5px;">
            Agregar
        </a>
    </div>

    <br>
    
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Peso</th>
                <th>Dimensiones</th>
                <th>Disponible</th>
                <th>Precio</th>
                <th>Más detalles</th>
                <th colspan="5">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($consultaMaterial as $material)
                <tr>
                    <td>{{ $material->nombre }}</td>
                    <td>{{ $material->peso }} kg</td>
                    <td>a:{{ $material->ancho ?? 'N/A' }}, h:{{ $material->alto ?? 'N/A' }}, l:{{ $material->largo ?? 'N/A' }}</td>
                    <td>
                        {{ $material->disponibilidad ? 'Sí' : 'No' }}
                        <button class="btn-action" onclick="agregarCantidad()">➕</button>
                        <button class="btn-action" onclick="restarCantidad()">➖</button>
                    </td>
                    <td>${{ number_format($material->precio, 2) }}</td>
                    <td>
                        <button onclick="verMasDetalles(
                            '{{ $material->nombre }}',
                            '{{ $material->caracteristicas }}',
                            'a:{{ $material->ancho ?? 'N/A' }}, h:{{ $material->alto ?? 'N/A' }}, l:{{ $material->largo ?? 'N/A' }}',
                            '{{ $material->precaucion ?? 'N/A' }}',
                            '{{ $material->codigoLote }}',
                            '{{ number_format($material->precio, 2) }}',
                            '{{ $material->fabricante ?? 'N/A' }}',
                            '{{ $material->material }}'
                        )" class="btn btn-info">Ver más</button>
                    </td>
                    <td>

                        <form id="form-eliminar-{{$material->materialID}}" action="{{ route('rutaEliminarMaterial', $material->materialID) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmarEliminacion({{$material->materialID}})">
                            {{ __('Eliminar') }}
                        </button>
                        

                        <a href="{{ route('verModMateriales', $material->materialID) }}" class="btn btn-primary" style="background-color: #98dbdbf7; color: rgb(0, 0, 0); border: none; padding: 10px 20px; border-radius: 5px;">
                            <strong>Modificar</strong>
                        </a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection
