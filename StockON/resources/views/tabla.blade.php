@extends('plantillas.cabeza2')

@section('css')
    @vite('resources/css/tabla.css')
    <style>
        :root {
            --header-height: 101px;
            --sidebar-width: 250px;
            --sidebar-collapsed-width: 50px;
            --section-header-bg: #6c757d;
            --item-bg: #5a6268;
            --active-border: #ffd700;
            --button-green: #28a745;
            --button-blue: #007bff;
        }

        .sidebar-container {
            position: fixed;
            left: 0;
            top: var(--header-height);
            bottom: 0;
            z-index: 999;
            transition: all 0.3s;
        }

        .sidebar {
            width: var(--sidebar-width);
            height: calc(100vh - var(--header-height));
            background-color: #bec2c5;
            border-right: 1px solid #dee2e6;
            overflow-x: hidden;
            overflow-y: auto;
            transition: all 0.3s;
            position: relative;
            padding: 10px;
        }

        .sidebar.collapsed {
            width: var(--sidebar-collapsed-width);
        }

        .sidebar-content {
            padding: 10px;
            opacity: 1;
            transition: opacity 0.2s;
        }

        .sidebar-section {
            margin-bottom: 15px;
        }

        .section-header {
            background-color: var(--section-header-bg);
            color: white;
            padding: 10px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .section-items {
            list-style: none;
            padding: 0;
            margin: 0;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }

        .section-items.show {
            max-height: 500px;
        }

        .sidebar-item {
            background-color: var(--item-bg);
            color: white;
            padding: 8px 15px;
            margin: 2px 0;
            cursor: pointer;
            transition: all 0.2s;
        }

        .sidebar-item.active {
            border-left: 4px solid var(--active-border);
        }

        .toggle-sidebar {
            background: #61777a !important; /* Color azul similar a los botones */
            border-color: #000000 !important;
            color: white;
            position: absolute;
            right: -15px;
            top: 10px;
            background: white;
            border: 1px solid #dee2e6;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 1000;
        }

        .main-content {
            margin-left: var(--sidebar-width);
            transition: margin-left 0.3s;
            padding: 20px;
            margin-top: var(--header-height);
        }

        .sidebar.collapsed + .main-content {
            margin-left: var(--sidebar-collapsed-width);
        }

        /* Estilos de los botones */
        .btn-inventario {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            text-align: center;
            color: white;
            border: none;
            border-radius: 5px;
            margin-bottom: 10px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .btn-gestionar {
            background-color: #17a2b8; /* Color de la imagen */
        }

        .btn-gestionar:hover {
            background-color: #138496;
        }

        .btn-agregar {
            background-color: #07ff3d; /* Color de la imagen */
            color: black;
        }

        .btn-agregar:hover {
            background-color: #e0a800;
        }
    </style>
@endsection

@section('contenido')


<div class="sidebar-container">
    <div class="sidebar" id="sidebar">
        <button class="toggle-sidebar" onclick="toggleSidebar()">
            <i class="fas fa-chevron-left" id="sidebar-icon"></i>
        </button>

        <div class="sidebar-content">
            <!-- Botones de Inventarios -->
            <button class="btn-inventario btn-gestionar">Gestionar Inventarios</button>
            <button class="btn-inventario btn-agregar">Agregar Inventario</button>

            <!-- Sección Venta -->
            <div class="sidebar-section">
                <div class="section-header" onclick="toggleSection(this)">
                    <span>Venta</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <ul class="section-items show">
                    <li class="sidebar-item">Metales</li>
                    <li class="sidebar-item">Electrónicos</li>
                    <li class="sidebar-item">Periféricos</li>
                </ul>
            </div>

            <!-- Sección Stock -->
            <div class="sidebar-section">
                <div class="section-header" onclick="toggleSection(this)">
                    <span>Stock</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <ul class="section-items show">
                    <li class="sidebar-item">Metales</li>
                    <li class="sidebar-item">Electrónicos</li>
                    <li class="sidebar-item">Periféricos</li>
                </ul>
            </div>
        </div>
    </div>
</div>



<div class="main-content">
    <div class="filtros-container">
        <table class="tabla-materiales">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Código lote</th>
                    <th>Precio unitario</th>
                    <th>Cantidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Todos los registros de la imagen -->
                <tr>
                    <td>Hierro</td>
                    <td>12343421</td>
                    <td>$50</td>
                    <td>35</td>
                    <td>
                        <button class="btn-accion ver-mas">Ver más</button>
                        <button class="btn-accion eliminar">Eliminar campo</button>
                    </td>
                </tr>
                <tr>
                    <td>Acero</td>
                    <td>21212112</td>
                    <td>$60</td>
                    <td>100</td>
                    <td>
                        <button class="btn-accion ver-mas">Ver más</button>
                        <button class="btn-accion eliminar">Eliminar campo</button>
                    </td>
                </tr>
                <tr>
                    <td>Cobre</td>
                    <td>12131313</td>
                    <td>$87</td>
                    <td>20</td>
                    <td>
                        <button class="btn-accion ver-mas">Ver más</button>
                        <button class="btn-accion eliminar">Eliminar campo</button>
                    </td>
                </tr>
                <tr>
                    <td>Acero</td>
                    <td>12133131</td>
                    <td>$23</td>
                    <td class="cantidad-cero">0</td>
                    <td>
                        <button class="btn-accion ver-mas">Ver más</button>
                        <button class="btn-accion eliminar">Eliminar campo</button>
                    </td>
                </tr>
                <tr>
                    <td>Plata</td>
                    <td>1378</td>
                    <td>$20</td>
                    <td>12</td>
                    <td>
                        <button class="btn-accion ver-mas">Ver más</button>
                        <button class="btn-accion eliminar">Eliminar campo</button>
                    </td>
                </tr>
                <tr>
                    <td>Oro</td>
                    <td>178371837</td>
                    <td>$15</td>
                    <td>89</td>
                    <td>
                        <button class="btn-accion ver-mas">Ver más</button>
                        <button class="btn-accion eliminar">Eliminar campo</button>
                    </td>
                </tr>
                <tr>
                    <td>Oro-12</td>
                    <td>3142313</td>
                    <td>$2087</td>
                    <td>43</td>
                    <td>
                        <button class="btn-accion ver-mas">Ver más</button>
                        <button class="btn-accion eliminar">Eliminar campo</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<style>
    .tabla-materiales {
        width: 100%;
        border-collapse: collapse;
        background: white;
        margin-top: 40px;
        box-shadow: 0 6px 12px rgba(0,0,0,0.2);
        font-size: 18px;
        border-radius: 8px;
        overflow: hidden;
    }

    .tabla-materiales th {
        background: #2c3e50;
        color: white;
        padding: 25px;
        text-align: left;
        border-bottom: 3px solid #3498db;
        font-weight: 600;
    }

    .tabla-materiales td {
        padding: 3px;
        border-bottom: 2px solid #ecf0f1;
        vertical-align: middle;
        color: #34495e;
    }

    .btn-accion {
        padding: 10px 20px;
        margin: 0 8px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: 0.3s;
        font-size: 16px;
        font-weight: 500;
    }

    .ver-mas {
        background: #3498db;
        color: white;
    }

    .eliminar {
        background: #e74c3c;
        color: white;
    }

    .btn-accion:hover {
        opacity: 0.9;
        transform: translateY(-2px);
        box-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }

    .cantidad-cero {
        color: #e74c3c !important;
        font-weight: 700;
        font-size: 19px;
    }

    tr:last-child td {
        border-bottom: none;
    }

    tr:hover td {
        background-color: #f8f9fa;
    }
</style>



<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const icon = document.getElementById('sidebar-icon');
        sidebar.classList.toggle('collapsed');
        icon.classList.toggle('fa-chevron-left');
        icon.classList.toggle('fa-chevron-right');
    }

    function toggleSection(header) {
        const sectionItems = header.nextElementSibling;
        const icon = header.querySelector('i');
        sectionItems.classList.toggle('show');
        icon.classList.toggle('fa-chevron-down');
        icon.classList.toggle('fa-chevron-up');
    }

    // Inicializar secciones abiertas
    document.querySelectorAll('.section-items').forEach(item => {
        if(item.classList.contains('show')) {
            item.previousElementSibling.querySelector('i').classList.add('fa-chevron-up');
        }
    });
</script>
@endsection
