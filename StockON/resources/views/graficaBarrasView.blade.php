@extends('plantillas.cabeza2')

@section('css')
    @vite('resources/css/menu.css')
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

        .inventario-opciones {
            display: flex;
            gap: 2rem;
            margin: 2rem 0;
            justify-content: center;
        }
        .periodo-btn {
            padding: 1rem 2rem;
            background: #4a5568;
            color: white;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
        }
        .periodo-btn:hover {
            background: #2d3748;
        }
        .chart-container {
            max-width: 800px;
            margin: 3rem auto;
        }

        .sidebar-buttons {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-top: 20px;
        }

        .sidebar-btn {
            display: flex;
            align-items: center;
            width: 100%;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            background: linear-gradient(145deg, #5a6268, #4a5568);
            color: white;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .sidebar-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(120deg,
                    transparent,
                    rgba(255, 255, 255, 0.2),
                    transparent);
            transition: 0.5s;
        }

        .sidebar-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .sidebar-btn:hover::before {
            left: 100%;
        }

        .sidebar-btn i {
            font-size: 1.2rem;
            margin-right: 12px;
            width: 25px;
            transition: margin 0.3s;
        }

        .sidebar-btn span {
            position: relative;
            z-index: 1;
        }

        /* Efecto para sidebar colapsado */
        .sidebar.collapsed .sidebar-btn {
            justify-content: center;
            padding: 12px;
        }

        .sidebar.collapsed .sidebar-btn i {
            margin-right: 0;
        }

        .sidebar.collapsed .sidebar-btn span {
            display: none;
        }

        /* Colores específicos para cada botón */
        .btn-agregar {
            background: linear-gradient(145deg, #28a745, #218838);
        }

        .btn-gestionar {
            background: linear-gradient(145deg, #007bff, #0069d9);
        }

        /* Efecto activo */
        .sidebar-btn.active {
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.2);
            transform: translateY(1px);
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
            <div class="sidebar-buttons">
                <a href="{{ route('verGraficaBarras') }}" class="sidebar-btn btn-agregar">
                    <i class="fas fa-boxes"></i>
                    <span>Gráfico de Productos</span>
                </a>
                
                <a href="{{ route('verGraficaPuntos') }}" class="sidebar-btn btn-gestionar">
                    <i class="fas fa-chart-line"></i>
                    <span>Gráfico de Ganancias</span>
                </a>
            </div>
        </div>
    </div>
</div>




    <div class="inventario-opciones">
        <div class="periodo-btn" data-periodo="anual">Anual</div>
        <div class="periodo-btn" data-periodo="mensual">Mensual</div>
        <div class="periodo-btn" data-periodo="semanal">Semanal</div>
    </div>

    <div class="chart-container">
        <canvas id="inventarioChart"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Configuración inicial del gráfico
        const ctx = document.getElementById('inventarioChart');
        let chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Producto 1', 'Producto 2', 'Producto 3', 'Producto 4', 'Producto 5'],
                datasets: [{
                    label: 'Stock Actual',
                    data: [65, 59, 80, 81, 56],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Ejemplo de cambio de datos al hacer clic (implementar lógica real según necesidad)
        document.querySelectorAll('.periodo-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const periodo = btn.dataset.periodo;
                // Aquí deberías hacer una petición AJAX para obtener datos reales
                console.log(`Cargar datos para periodo: ${periodo}`);
                
                // Ejemplo de actualización de datos
                chart.data.datasets[0].data = [Math.random() * 100, Math.random() * 100, 
                                             Math.random() * 100, Math.random() * 100, 
                                             Math.random() * 100];
                chart.update();
            });
        });
    </script>
@endsection