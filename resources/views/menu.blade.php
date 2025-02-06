@extends('plantillas.cabeza2')

@section('css')
    @vite('resources/css/menu.css')
@endsection

@section('contenido')

    <!-- CONTENIDO PRINCIPAL -->
    <div class="menu-container">
        <!-- Primer recuadro: Gestionar Inventario -->
        <div class="box">
            <img src="{{ asset('img/boxIcon.png') }}" alt="Icono Inventario">
            <a href="{{ route('tabla') }}" class="btn btn-primary" style="background-color: #1e1f1fa9; color: white; border: none; padding: 10px 20px; border-radius: 5px;">>
                Gestionar Inventario
            </a>
        </div>

        <!-- Segundo recuadro: Ver Proveedores -->
    <div class="box">
            <img src="{{ asset('img/Iperson.png') }}" alt="Icono Proveedores">
            <a href="{{ route('proveedores') }}" class="btn btn-primary" style="background-color: #1e1f1fa9; color: white; border: none; padding: 10px 20px; border-radius: 5px;">>
                Ver Proveedores
            </a>
        </div>

    

        <div class="box">
            <img src="{{ asset('img/gear.png') }}" alt="Icono Empleados">
            <a href="{{route('empleados')}}" class="btn btn-primary" style="background-color: #1e1f1fa9; color: white; border: none; padding: 10px 20px; border-radius: 5px;">>
                Ver empleados
            </a>
        </div>

    </div>





    <!-- FIN CONTENIDO PRINCIPAL -->



@endsection
