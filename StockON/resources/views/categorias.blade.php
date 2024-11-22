@extends('plantillas.cabeza2')
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
                <a href="#" class="btn btn-primary" style="background-color: #fa6a6af7; color: rgb(0, 0, 0); border: none; padding: 10px 20px; border-radius: 5px;" onclick="confirmDelete(event)">
                    <strong>Borrar</strong>
                </a>
                <a href="{{ route('verModificarCategorias', $categoria->categoriaID) }}" class="btn btn-primary" style="background-color: #98dbdbf7; color: rgb(0, 0, 0); border: none; padding: 10px 20px; border-radius: 5px;">
                    <strong>Modificar</strong>
                </a>
            </td>
        </tr>
        @endforeach
    
    </tbody>
</table>



@endsection
