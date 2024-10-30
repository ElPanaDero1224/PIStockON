@extends('plantillas.cabeza2')
@section('contenido')

    <!-- CONTENIDO PRINCIPAL -->
    <div class="container">
        <!-- Primer recuadro: Gestionar Inventario -->
        <div class="box">
            <img src="{{ asset('img/boxIcon.png') }}" alt="Icono Inventario">
            <button>Gestionar Inventario</button>
        </div>

        <!-- Segundo recuadro: Ver Proveedores -->
        <div class="box">
            <img src="{{ asset('img/Iperson.png') }}" alt="Icono Proveedores">
            <button>Ver Proveedores</button>
        </div>
    </div>
    <!-- FIN CONTENIDO PRINCIPAL -->

@endsection