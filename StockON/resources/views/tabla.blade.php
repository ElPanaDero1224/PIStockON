@extends('plantillas.cabeza2')

@section('css')
    @vite('resources/css/tabla.css')
@endsection

@section('contenido')
    <div style="text-align: center; margin: 20px;">
        <a href="{{ route('agregarMaterial') }}" class="btn btn-primary" style="background-color: #7fff7dc5; color: rgb(0, 0, 0); border: none; padding: 10px 20px; border-radius: 5px;">
            Agregar
        </a>
    </div>
    
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
            <tr>
                <td>Tornillos</td>
                <td>0.05kg</td>
                <td>a:20, h:30, l:20</td>
                <td>20 <button class="btn-action">➕</button> <button class="btn-action">➖</button></td>
                <td>$1.20</td>
                <td>    
                    <a href="#" class="btn btn-primary" style="background-color: #ffda7df7; color: rgb(0, 0, 0); border: none; padding: 10px 20px; border-radius: 5px;">
                        <strong>Mas</strong> 
                    </a>
                </td>
                <td>
                    <a href="#" class="btn btn-primary" style="background-color: #fa6a6af7; color: rgb(0, 0, 0); border: none; padding: 10px 20px; border-radius: 5px;">
                        <strong>Borrar</strong>
                    </a>

                    <a href="#" class="btn btn-primary" style="background-color: #98dbdbf7; color: rgb(0, 0, 0); border: none; padding: 10px 20px; border-radius: 5px;">
                    <strong>Modificar</strong>
                    </a>
                    
                </td>
            </tr>
            <tr>
                <td>Martillos</td>
                <td>1kg</td>
                <td>a:20, h:30, l:20</td>
                <td>30 <button class="btn-action">➕</button> <button class="btn-action">➖</button></td>
                <td>$150</td>
                
                <td>    
                        <a href="#" class="btn btn-primary" style="background-color: #ffda7df7; color: rgb(0, 0, 0); border: none; padding: 10px 20px; border-radius: 5px;">
                        <strong>Ver más</strong>
                        </a>
                    </td>
                    <td>
                        <a href="#" class="btn btn-primary" style="background-color: #fa6a6af7; color: rgb(0, 0, 0); border: none; padding: 10px 20px; border-radius: 5px;">
                        <strong>Borrar</strong>
                        </a>
    
                        <a href="#" class="btn btn-primary" style="background-color: #98dbdbf7; color: rgb(0, 0, 0); border: none; padding: 10px 20px; border-radius: 5px;">
                        <strong>Modificar</strong>
                        </a>
                        
                    </td>
            </tr>
            <!-- Agrega más filas según sea necesario -->
        </tbody>
    </table>
@endsection