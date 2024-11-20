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


@foreach($proveedores as $p)
    

<x-proveedor nombre="{{$p->nombre}}" 
telefono="{{$p->numTelefono}}" 
correo="{{$p->correo}}" 
productos="{{$p->tiposProducto}}" 
condicionesPago="{{$p->condicionesPago}}" >
</x-proveedor>
@endforeach

@endsection
