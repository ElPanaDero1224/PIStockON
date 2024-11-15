@extends('plantillas.cabeza2')

@section('contenido')

<div style="margin: 20px 0; display: flex; justify-content: flex-start;">
    <a href="{{ route('agregarEmpleado') }}" class="btn btn-primary" style="background-color: #7fff7dc5; color: rgb(0, 0, 0); border: none; padding: 10px 20px; border-radius: 5px; margin-right: 10px;">
        Agregar empleado
    </a>
    <a href="{{ route('categorias') }}" class="btn btn-primary" style="background-color: #a0de53a1; color: rgb(0, 0, 0); border: none; padding: 10px 20px; border-radius: 5px;">
        Ver categorias
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
        <tr>
            <td>Isabel</td>
            <td>Villagran Olvera</td>
            <td>isa@gmail.com</td>
            <td>4423234232</td>
            <td>CEO</td>
            <td>
                <a href="#" class="btn btn-primary" style="background-color: #fa6a6af7; color: rgb(0, 0, 0); border: none; padding: 10px 20px; border-radius: 5px;" onclick="confirmDelete(event)">
                    <strong>Borrar</strong>
                </a>
                <a href="{{route('verModificarEmpleado')}}" class="btn btn-primary" style="background-color: #98dbdbf7; color: rgb(0, 0, 0); border: none; padding: 10px 20px; border-radius: 5px;">
                    <strong>Modificar</strong>
                </a>
            </td>
        </tr>
        <tr>
            <td>Juan Armando</td>
            <td>Velazquez Alvarez</td>
            <td>juan@gmail.com</td>
            <td>5556789123</td>
            <td>Gerente</td>
            <td>
                <a href="#" class="btn btn-primary" style="background-color: #fa6a6af7; color: rgb(0, 0, 0); border: none; padding: 10px 20px; border-radius: 5px;" onclick="confirmDelete(event)">
                    <strong>Borrar</strong>
                </a>
                <a href="{{route('verModificarEmpleado')}}" class="btn btn-primary" style="background-color: #98dbdbf7; color: rgb(0, 0, 0); border: none; padding: 10px 20px; border-radius: 5px;">
                    <strong>Modificar</strong>
                </a>
            </td>
        </tr>

    </tbody>
</table>



@endsection
