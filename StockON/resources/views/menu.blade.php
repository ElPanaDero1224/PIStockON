<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal - StockON</title>
    @vite(['resources/js/app.js'])

    <style>

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            text-align: center;
        }
        header {
            background-color: #ffeb3b;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }
        header img {
            max-height: 350px;
            margin-right: 15px;
        }
        header h1 {
            font-size: 2rem;
            color: #000;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
            gap: 50px;
        }
        .box {
            width: 200px;
            height: 200px;
            background-color: #eeeeee;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .box img {
            max-width: 60px;
            margin-bottom: 10px;
        }
        .box button {
            background-color: black;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        .box button:hover {
            background-color: #333;
        }
    </style>
</head>
<body>

    <!-- HEADER -->
    <header>
        <img src="{{ asset('img/txt.png') }}" alt="Logo StockON">
    </header>
    <!-- FIN HEADER -->

    <!-- CONTENIDO PRINCIPAL -->
    <div class="container">
        <!-- Primer recuadro: Gestionar Inventario -->
        <div class="box">
            <img src="{{ asset('images/icono-inventario.png') }}" alt="Icono Inventario">
            <button>Gestionar Inventario</button>
        </div>

        <!-- Segundo recuadro: Ver Proveedores -->
        <div class="box">
            <img src="{{ asset('images/icono-proveedores.png') }}" alt="Icono Proveedores">
            <button>Ver Proveedores</button>
        </div>
    </div>
    <!-- FIN CONTENIDO PRINCIPAL -->

</body>
</html>
