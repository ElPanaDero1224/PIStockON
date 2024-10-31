<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'StockON')</title>
    <link rel="stylesheet" href="{{ asset('resources/css/header.css') }}">

    @vite(['resources/js/app.js'])
    @vite('resources/css/header.css')
    @yield('css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11">

document.addEventListener('DOMContentLoaded', function () {
    // Acción de borrar
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function () {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "No podrás revertir esta acción.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, bórralo'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Borrado', 'El ítem ha sido borrado.', 'success');
                }
            });
        });
    });

    // Acción de restar
    document.querySelectorAll('.btn-restar').forEach(button => {
        button.addEventListener('click', function () {
            Swal.fire({
                title: 'Restar cantidad',
                input: 'number',
                inputLabel: 'Ingresa la cantidad a restar',
                showCancelButton: true,
                confirmButtonText: 'Restar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Restado', `Cantidad restada: ${result.value}`, 'success');
                }
            });
        });
    });

    // Acción de agregar
    document.querySelectorAll('.btn-add').forEach(button => {
        button.addEventListener('click', function () {
            Swal.fire({
                title: 'Agregar cantidad',
                input: 'number',
                inputLabel: 'Ingresa la cantidad a agregar',
                showCancelButton: true,
                confirmButtonText: 'Agregar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Agregado', `Cantidad agregada: ${result.value}`, 'success');
                }
            });
        });
    });

    // Acción de ver más
    document.querySelectorAll('.btn-view').forEach(button => {
        button.addEventListener('click', function () {
            Swal.fire({
                title: 'Detalles del ítem',
                text: 'Aquí puedes ver información detallada del ítem seleccionado.',
                icon: 'info',
                confirmButtonText: 'Cerrar'
            });
        });
    });
});

    
    
    </script>


   

    
</head>
<body>

    <!-- HEADER -->
    <header>
        <img src="{{ asset('img/txt.png') }}" alt="Logo StockON">
    </header>
    <!-- FIN HEADER -->

  
    <div class="container">
        @yield('contenido')
    </div>
    <!-- FIN CONTENIDO PRINCIPAL -->

</body>
</html>
