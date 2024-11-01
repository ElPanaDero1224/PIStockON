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



<x-proveedor nombre="Electrotech Distribuciones" 
telefono="+54 11-2233-4455" 
correo="mruiz@electrotech.com" 
productos="Componentes electrónicos, cables, baterías" 
condicionesPago="45 días después de la entrega" >
</x-proveedor>


@endsection
