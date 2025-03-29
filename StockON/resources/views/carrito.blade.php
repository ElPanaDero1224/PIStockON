@extends('plantillas.cabeza2')

@section('css')
    @vite('resources/css/menu.css')
    
@endsection

@section('contenido')

<br>
<div class="table-container">
    <table class="table table-striped table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($carritos as $carrito)
                <tr>
                    
                    <td>{{ $carrito->producto->nombre }}</td> 
                    <td>{{ $carrito->cantidad }}</td>
                    <td>{{ $carrito->precio }}</td>
                    <td>{{ $carrito->fecha }}</td>
                    <td>
                        <form action="{{ route('carrito.remove', $carrito->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                        <form action="{{ route('carrito.update', $carrito->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="number" name="cantidad" value="{{ $carrito->cantidad }}">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                        <form action="{{ route('carrito.moveToVentas', $carrito->id) }}" method="POST">
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-cash-register"></i> Vender
                            </button>
                        </form>
                    </td>
                </tr>
                
            @endforeach
        </tbody>
    </table>

</div>

@endsection
