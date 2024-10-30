@extends('plantillas.cabeza2')

@section('css')
    @vite('resources/css/tabla.css')
@endsection

@section('contenido')
    <div style="text-align: center; margin: 20px;">
        <button class="btn-add">Agregar</button>
    </div>
    
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Peso</th>
                <th>Dimensiones</th>
                <th>Disponible</th>
                <th>Precio</th>
                <th colspan="2">Más detalles</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tornillos</td>
                <td>0.05kg</td>
                <td>a:20, h:30, l:20</td>
                <td>20 <button class="btn-action">➕</button> <button class="btn-action">➖</button></td>
                <td>$1.20</td>
                <td><button class="btn-view">Ver más</button></td>
                <td><button class="btn-delete">Borrar</button> <button class="btn-edit">Modificar</button></td>
            </tr>
            <tr>
                <td>Martillos</td>
                <td>1kg</td>
                <td>a:20, h:30, l:20</td>
                <td>30 <button class="btn-action">➕</button> <button class="btn-action">➖</button></td>
                <td>$150</td>
                <td><button class="btn-view">Ver más</button></td>
                <td><button class="btn-delete">Borrar</button> <button class="btn-edit">Modificar</button></td>
            </tr>
            <!-- Agrega más filas según sea necesario -->
        </tbody>
    </table>
@endsection