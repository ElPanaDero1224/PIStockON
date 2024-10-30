@extends('plantillas.cabeza2')

@section('css')
    @vite('resources/css/proveedores.css')
@endsection

@section('contenido')
<div class="container text-center mt-5">
    <h1 class="mb-4">Menú de Proveedores</h1>
    <button class="btn btn-agregar mb-3">Agregar Producto</button>

    <div class="d-flex justify-content-center">
      <div class="card p-3" style="max-width: 600px;">
        <div class="card-body">
          <h5 class="card-title">Electrotech Distribuciones</h5>
          <p class="card-text">
            <strong>Núm:</strong> +54 11-2233-4455<br>
            <strong>Correo:</strong> mruiz@electrotech.com
          </p>
          <p class="card-text">
            <strong>Tipo de Productos Suministrados:</strong> Componentes electrónicos, cables, baterías
          </p>
          <p class="card-text">
            <strong>Condiciones de Pago:</strong> 45 días después de la entrega
          </p>
        </div>
        <div class="card-footer d-flex justify-content-end gap-2">
          <button class="btn btn-modificar">Modificar</button>
          <button class="btn btn-ver-mas">Ver más</button>
          <button class="btn btn-borrar">Borrar</button>
        </div>
      </div>
    </div>
</div>
@endsection
