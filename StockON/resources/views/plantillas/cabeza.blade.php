<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>@yield('titulo')</title>
    @vite(['resources/js/app.js'])
    @yield('css')
</head>

<body>
    @yield('contenido')
    
</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: '¡Error!',
                html: `<ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>`,
                confirmButtonText: 'Cerrar'
            });
        @endif
    });
</script>

</html>
