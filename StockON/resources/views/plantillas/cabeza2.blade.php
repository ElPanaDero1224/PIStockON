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
