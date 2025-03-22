@extends('plantillas.cabeza2')

@section('css')
    @vite('resources/css/proveedores.css')
@endsection

@section('contenido')

<div style="text-align: center; margin: 20px;">
    <a href="{{ route('agregarProveedor') }}" class="btn btn-primary" style="background-color: #7fff7dc5; color: rgb(0, 0, 0); border: none; padding: 10px 20px; border-radius: 5px;">
        Agregar
    </a>
</div>

<div class="proveedores-container">
    @foreach($proveedores as $p)
        <div class="proveedor-card">
            <x-proveedor 
                nombre="{{ $p->nombre }}" 
                telefono="{{ $p->numTelefono }}" 
                correo="{{ $p->correo }}" 
                productos="{{ $p->tiposProducto }}" 
                condicionesPago="{{ $p->condicionesPago }}" 
                frecuenciaSuministro="{{ $p->frecuenciaSuministro }}"
                horarioAtencion="{{ $p->horarioAtencion }}"
                pais="{{ $p->pais }}"
                ciudad="{{ $p->ciudad }}"
                id="{{ $p->proveedorID }}"
            >
            </x-proveedor>
        </div>
    @endforeach
</div>

@endsection


<script>
    function confirmarEliminacion($id) {
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
                document.getElementById(`form-eliminar-${$id}`).submit();
            }
        });
    }
</script>