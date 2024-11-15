
    <div class="d-flex justify-content-center">
        <div class="card p-3" style="max-width: 600px;">
            <div class="card-body">
                <h5 class="card-title">{{ $nombre }}</h5>
                <p class="card-text">
                    <strong>Núm:</strong> {{ $telefono }}<br>
                    <strong>Correo:</strong> {{ $correo }}
                </p>
                <p class="card-text">
                    <strong>Tipo de Productos Suministrados:</strong> {{ $productos }}
                </p>
                <p class="card-text">
                    <strong>Condiciones de Pago:</strong> {{ $condicionesPago }}
                </p>
            </div>
            <div class="card-footer d-flex justify-content-end gap-2">


                <a href="#" class="btn btn-primary" 
                    style="background-color: #ffda7df7; color: rgb(0, 0, 0); border: none; padding: 10px 20px; border-radius: 5px;" 
                    onclick="mostrarDetallesProveedor('{{ $nombre }}', '{{ $telefono }}', '{{ $correo }}', '{{ $productos }}', '{{ $condicionesPago }}')">
                    <strong>Ver más</strong>
                </a>

                <a href="#" class="btn btn-primary" style="background-color: #fa6a6af7; color: rgb(0, 0, 0); border: none; padding: 10px 20px; border-radius: 5px;" onclick="confirmDelete(event)">
                    <strong>Borrar</strong>
                </a>
                <a href="{{route('modProveedor')}}" class="btn btn-primary" style="background-color: #98dbdbf7; color: rgb(0, 0, 0); border: none; padding: 10px 20px; border-radius: 5px;">
                    <strong>Modificar</strong>
                </a>
            </div>
        </div>
    </div>