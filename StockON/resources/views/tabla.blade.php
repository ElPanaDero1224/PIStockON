@extends('plantillas.cabeza2')

@section('css')
    @vite('resources/css/tabla.css')
@endsection

@section('contenido')

<div class="sidebar-container">
    <div class="sidebar" id="sidebar">
        <button class="toggle-sidebar" onclick="toggleSidebar()">
            <i class="fas fa-chevron-left" id="sidebar-icon"></i>
        </button>

        <div class="sidebar-content">
            <!-- Botones de Inventarios -->
            <a href="URL_DESTINO_GESTIONAR">
                <button class="btn-inventario btn-gestionar">Gestionar Inventarios</button>
            </a>
            
            <a href="{{ route('addInventario') }}">
                <button class="btn-inventario btn-agregar">Agregar Inventario</button>
            </a>

            <!-- Sección Venta -->
            <div class="sidebar-section">
                <div class="section-header" onclick="toggleSection(this)">
                    <span>Venta</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <ul class="section-items show">
                    @if($inv_ventas->isEmpty())
                        <li class="sidebar-item">No hay inventarios de venta</li>
                    @else
                        @foreach($inv_ventas as $inventario)
                            <a href="{{ route('tabla', ['id_inventario' => $inventario->id]) }}">
                                <li class="sidebar-item">{{ $inventario->nombre }}</li>
                            </a>
                        @endforeach
                    @endif
                </ul>
            </div>

            <!-- Sección Stock -->
            <div class="sidebar-section">
                <div class="section-header" onclick="toggleSection(this)">
                    <span>Stock</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <ul class="section-items show">
                    @if($inv_compras->isEmpty())
                        <li class="sidebar-item">No hay inventarios de stock</li>
                    @else
                        @foreach($inv_compras as $inventario)
                            <a href="{{ route('tabla', ['id_inventario' => $inventario->id]) }}">
                                <li class="sidebar-item">{{ $inventario->nombre }}</li>
                            </a>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="main-content">
    <div class="container-fluid px-4">
        @if(is_null($id_inventario))
            <!-- Mensaje cuando no hay inventario seleccionado -->
            <div class="alert alert-info text-center py-5 my-5">
                <h2><i class="fas fa-inbox me-2"></i> Selecciona un inventario</h2>
                <p class="lead mt-3">Por favor, elige un inventario del menú lateral para ver y gestionar sus productos.</p>
            </div>
        @else
            <!-- Contenido normal cuando hay inventario seleccionado -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('addProductos', ['id_inventario' => $id_inventario]) }}">
                            <button class="btn btn-success btn-lg fw-bold">
                                <i class="fas fa-plus me-2"></i> Agregar Producto
                            </button>
                        </a>

                        <a href="{{ route('verGraficaBarras') }}">
                            <button class="btn btn-primary btn-lg fw-bold">
                                <i class="fas fa-chart-line me-2"></i>Graficar
                            </button>
                        </a>
                    </div>
                </div>
            </div>




            {{-- Inicio de los filtros --}}

{{-- Inicio de los filtros --}}
<div class="filtros-bar bg-light p-3 rounded-3 shadow-sm mb-4">
    <div class="row g-3">
        <!-- Grupo 1: Búsqueda Material -->
        <div class="col-md-3">
            <div class="input-group">
                <input type="text" 
                       id="filtro-nombre"
                       class="form-control form-control-lg" 
                       placeholder="Buscar Material">
                <button class="btn btn-outline-secondary" type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
            
            <div class="btn-group mt-2 w-100">
                <button class="btn btn-primary" onclick="ordenarAZ()">
                    <i class="fas fa-sort-alpha-down"></i> A-Z
                </button>
                <button class="btn btn-primary" onclick="ordenarZA()">
                    <i class="fas fa-sort-alpha-down-alt"></i> Z-A
                </button>
            </div>
        </div>
        
        <!-- Grupo 2: Código de Lote -->
        <div class="col-md-3">
            <div class="input-group">
                <input type="text" 
                       id="filtro-lote"
                       class="form-control form-control-lg" 
                       placeholder="Buscar Código de lote">
                <button class="btn btn-outline-secondary" type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
        
        <!-- Grupo 3: Filtros por Precio -->
        <div class="col-md-3">
            <div class="input-group mb-2">
                <span class="input-group-text">$</span>
                <input type="number" id="precio-min" class="form-control" placeholder="Mínimo">
                <span class="input-group-text">-</span>
                <input type="number" id="precio-max" class="form-control" placeholder="Máximo">
            </div>
            
            <div class="btn-group w-100">
                <button class="btn btn-primary" onclick="ordenarPrecioAsc()">
                    <i class="fas fa-sort-numeric-down-alt"></i> Precio ↑
                </button>
                <button class="btn btn-primary" onclick="ordenarPrecioDesc()">
                    <i class="fas fa-sort-numeric-down"></i> Precio ↓
                </button>
            </div>
        </div>
        
        <!-- Grupo 4: Filtros por Cantidad -->
        <div class="col-md-3">
            <div class="input-group mb-2">
                <span class="input-group-text">Cant.</span>
                <input type="number" id="cantidad-min" class="form-control" placeholder="Mínimo">
                <span class="input-group-text">-</span>
                <input type="number" id="cantidad-max" class="form-control" placeholder="Máximo">
            </div>
            
            <div class="d-flex align-items-end h-100">
                <button class="btn btn-danger w-100 py-2" onclick="limpiarFiltros()">
                    <i class="fas fa-eraser me-2"></i>Limpiar Filtros
                </button>
            </div>
        </div>
    </div>
</div>
{{-- fin de los filtros --}}


            {{-- fin de los filtros --}}





            <!-- Contenedor de la tabla con scrollbar -->
            <div class="filtros-container" style="margin-top: 20px; overflow-y: auto; max-height: 500px;">
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
                        @if($productos->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center">No hay productos en este inventario.</td>
                            </tr>
                        @else
                            @foreach($productos as $producto)
                                <tr>
                                    <td>{{ $producto->nombre }}</td>
                                    <td>{{ $producto->codigoLote }}</td>
                                    <td>
                                        ${{ number_format($producto->precioUnitario, 2) }}
                                        

                                    </td>
                                    <td>{{ $producto->cantidad }}</td>
                                    <td>
                                        <button class="btn-accion ver-mas">Ver más</button>
                                        <button class="btn-accion eliminar">Eliminar campo</button>
                                        <button class="btn-accion actualizar">Actualizar</button>
                                        <button class="btn-accion ver-mas">Vender</button>
                                        <button class="btn-accion ver-mas">Reabastecer</button>
                                        <button class="btn-accion ver-mas">Añadir al carrito</button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let filas = document.querySelectorAll(".tabla-materiales tbody tr");
        if (filas.length > 0) {
            let alturaFila = filas[0].offsetHeight;
            document.querySelector(".filtros-container").style.maxHeight = `${alturaFila * 4}px`;
        }
    });

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
<script>
    // Objeto para almacenar todos los filtros activos
    const filtrosActivos = {
        nombre: '',
        lote: '',
        precioMin: null,
        precioMax: null,
        cantidadMin: null,
        cantidadMax: null
    };
    
    // Inicialización cuando el DOM está listo
    document.addEventListener("DOMContentLoaded", function() {
        // Configurar event listeners para todos los filtros
        document.getElementById('filtro-nombre').addEventListener('input', function() {
            filtrosActivos.nombre = this.value.toLowerCase();
            filtrarTabla();
        });
        
        document.getElementById('filtro-lote').addEventListener('input', function() {
            filtrosActivos.lote = this.value.toLowerCase();
            filtrarTabla();
        });
        
        document.getElementById('precio-min').addEventListener('input', function() {
            filtrosActivos.precioMin = this.value ? parseFloat(this.value) : null;
            filtrarTabla();
        });
        
        document.getElementById('precio-max').addEventListener('input', function() {
            filtrosActivos.precioMax = this.value ? parseFloat(this.value) : null;
            filtrarTabla();
        });
        
        document.getElementById('cantidad-min').addEventListener('input', function() {
            filtrosActivos.cantidadMin = this.value ? parseInt(this.value) : null;
            filtrarTabla();
        });
        
        document.getElementById('cantidad-max').addEventListener('input', function() {
            filtrosActivos.cantidadMax = this.value ? parseInt(this.value) : null;
            filtrarTabla();
        });
        
        // Aplicar debounce a los filtros de texto para mejor rendimiento
        aplicarDebounce();
    });
    
    // Función para aplicar debounce a los filtros de texto
    function aplicarDebounce() {
        const debounce = (func, wait) => {
            let timeout;
            return function() {
                const context = this, args = arguments;
                clearTimeout(timeout);
                timeout = setTimeout(() => func.apply(context, args), wait);
            };
        };
        
        document.getElementById('filtro-nombre').addEventListener('input', 
            debounce(function() {
                filtrosActivos.nombre = this.value.toLowerCase();
                filtrarTabla();
            }, 300)
        );
        
        document.getElementById('filtro-lote').addEventListener('input', 
            debounce(function() {
                filtrosActivos.lote = this.value.toLowerCase();
                filtrarTabla();
            }, 300)
        );
    }
    
    // Función principal de filtrado
    function filtrarTabla() {
        const filas = document.querySelectorAll(".tabla-materiales tbody tr");
        let algunaFilaVisible = false;
        
        filas.forEach(fila => {
            const nombre = fila.cells[0].textContent.toLowerCase();
            const lote = fila.cells[1].textContent.toLowerCase();
            const precio = parseFloat(fila.cells[2].textContent.replace('$', ''));
            const cantidad = parseInt(fila.cells[3].textContent);
            
            // Aplicar todos los filtros
            const coincideNombre = !filtrosActivos.nombre || nombre.includes(filtrosActivos.nombre);
            const coincideLote = !filtrosActivos.lote || lote.includes(filtrosActivos.lote);
            const coincidePrecioMin = filtrosActivos.precioMin === null || precio >= filtrosActivos.precioMin;
            const coincidePrecioMax = filtrosActivos.precioMax === null || precio <= filtrosActivos.precioMax;
            const coincideCantidadMin = filtrosActivos.cantidadMin === null || cantidad >= filtrosActivos.cantidadMin;
            const coincideCantidadMax = filtrosActivos.cantidadMax === null || cantidad <= filtrosActivos.cantidadMax;
            
            if (coincideNombre && coincideLote && coincidePrecioMin && coincidePrecioMax && 
                coincideCantidadMin && coincideCantidadMax) {
                fila.style.display = '';
                algunaFilaVisible = true;
            } else {
                fila.style.display = 'none';
            }
        });
        
        // Mostrar mensaje si no hay resultados
        mostrarMensajeSinResultados(!algunaFilaVisible);
    }
    
    // Funciones de ordenamiento mejoradas
    function ordenarAZ() {
        ordenarTabla((a, b) => a.cells[0].textContent.localeCompare(b.cells[0].textContent));
    }
    
    function ordenarZA() {
        ordenarTabla((a, b) => b.cells[0].textContent.localeCompare(a.cells[0].textContent));
    }
    
    function ordenarPrecioAsc() {
        ordenarTabla((a, b) => {
            const precioA = parseFloat(a.cells[2].textContent.replace('$', ''));
            const precioB = parseFloat(b.cells[2].textContent.replace('$', ''));
            return precioA - precioB;
        });
    }
    
    function ordenarPrecioDesc() {
        ordenarTabla((a, b) => {
            const precioA = parseFloat(a.cells[2].textContent.replace('$', ''));
            const precioB = parseFloat(b.cells[2].textContent.replace('$', ''));
            return precioB - precioA;
        });
    }
    
    // Función genérica para ordenar la tabla
    function ordenarTabla(comparador) {
        const tabla = document.querySelector(".tabla-materiales tbody");
        const filas = Array.from(tabla.querySelectorAll("tr"))
            .filter(fila => fila.style.display !== 'none');
        
        filas.sort(comparador);
        
        // Reinsertar filas ordenadas
        filas.forEach(fila => tabla.appendChild(fila));
    }
    
    // Función para limpiar todos los filtros
    function limpiarFiltros() {
        // Limpiar valores de los inputs
        document.getElementById('filtro-nombre').value = '';
        document.getElementById('filtro-lote').value = '';
        document.getElementById('precio-min').value = '';
        document.getElementById('precio-max').value = '';
        document.getElementById('cantidad-min').value = '';
        document.getElementById('cantidad-max').value = '';
        
        // Resetear filtros activos
        for (let key in filtrosActivos) {
            if (filtrosActivos.hasOwnProperty(key)) {
                filtrosActivos[key] = key === 'nombre' || key === 'lote' ? '' : null;
            }
        }
        
        // Mostrar todas las filas y ocultar mensaje
        const filas = document.querySelectorAll(".tabla-materiales tbody tr");
        filas.forEach(fila => fila.style.display = '');
        mostrarMensajeSinResultados(false);
    }
    
    // Función para mostrar/ocultar mensaje cuando no hay resultados
    function mostrarMensajeSinResultados(mostrar) {
        let mensaje = document.getElementById('mensaje-sin-resultados');
        
        if (mostrar) {
            if (!mensaje) {
                mensaje = document.createElement('tr');
                mensaje.id = 'mensaje-sin-resultados';
                mensaje.innerHTML = '<td colspan="5" class="text-center text-muted py-4"><i class="fas fa-inbox fa-2x mb-2"></i><br>No se encontraron productos con los filtros aplicados</td>';
                document.querySelector(".tabla-materiales tbody").appendChild(mensaje);
            }
        } else if (mensaje) {
            mensaje.remove();
        }

    
    }
    </script>
@endsection