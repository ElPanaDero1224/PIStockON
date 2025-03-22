@extends('plantillas.cabeza2')

@section('css')
    @vite('resources/css/menu.css')
    <style>
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
    </style>
@endsection

@section('contenido')
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