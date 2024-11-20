<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'StockON')</title>
    <link rel="stylesheet" href="{{ asset('resources/css/header.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @vite(['resources/js/app.js'])
    @vite('resources/css/header.css')
    @yield('css')

</head>
<body>

    <header>
        <div class="header-left">
            <a href="{{route('menu')}}">
            <img src="{{ asset('img/txt.png') }}" alt="Logo StockON">
            </a>
        </div>
        <div class="header-right">
            <a href="{{route('menu')}}">Menú</a>
            <a href="{{route('proveedores')}}">Proveedores</a>
            <a href="{{route('tabla')}}">Inventario</a>
            <a href="{{route('empleados')}}">Empleados</a>
            <a href="{{route('iniciar')}}">Cerrar sesion</a>
        </div>
    </header>

  
    <div class="container">
        @yield('contenido')
    </div>
    <!-- FIN CONTENIDO PRINCIPAL -->

</body>

<script>
    function confirmDelete(event) {
        event.preventDefault(); 

        Swal.fire({
            title: "¿Seguro que quieres borrar?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Aceptar",
            cancelButtonText: "Cancelar",
            confirmButtonColor: "#28a745",
            cancelButtonColor: "#dc3545"  
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire("Eliminado", "El registro ha sido borrado", "success");
            } else if (result.isDismissed) {
                Swal.fire("Cancelado", "El registro no ha sido borrado", "info");
            }
        });

        
    }

function agregarCantidad() {
    Swal.fire({
        title: "Agregar cantidad",
        input: "number",
        inputAttributes: {
            placeholder: "Ingresa la cantidad",
            min: 1
        },
        showCancelButton: true,
        confirmButtonText: "Añadir",
        confirmButtonColor: "#28a745", 
        cancelButtonText: "Cancelar",
        cancelButtonColor: "#dc3545",  
        preConfirm: (cantidad) => {
            if (!cantidad || cantidad <= 0) {
                Swal.showValidationMessage("Por favor ingresa una cantidad válida.");
            }
            return cantidad;
        }
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire("Cantidad agregada", `Se han añadido ${result.value} unidades.`, "success");

        }
    });
}


function restarCantidad() {
    Swal.fire({
        title: "Restar cantidad",
        input: "number",
        inputAttributes: {
            placeholder: "Ingresa la cantidad",
            min: 1
        },
        showCancelButton: true,
        confirmButtonText: "Restar",
        confirmButtonColor: "#28a745", 
        cancelButtonText: "Cancelar",
        cancelButtonColor: "#dc3545",  
        preConfirm: (cantidad) => {
            if (!cantidad || cantidad <= 0) {
                Swal.showValidationMessage("Por favor ingresa una cantidad válida.");
            }
            return cantidad;
        }
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire("Cantidad restada", `Se han restado ${result.value} unidades.`, "success");

        }
    });
}


function verMasDetalles(nombre, caracteristicas, dimensiones, precauciones, codigo, precio, fabricante, material) {
    Swal.fire({
        title: `<strong>Nombre: ${nombre}</strong>`,
        html: `
            <p><strong>Características:</strong><br>${caracteristicas}</p>
            <p><strong>Dimensiones:</strong><br>${dimensiones}</p>
            <p><strong>Medidas de precaución:</strong><br>${precauciones}</p>
            <p><strong>Código del lote:</strong><br>${codigo}</p>
            <p><strong>Precio:</strong><br>${precio}</p>
            <p><strong>Fabricante:</strong><br>${fabricante}</p>
            <p><strong>Material:</strong><br>${material}</p>
        `,
        showCloseButton: true,
        focusConfirm: false,
        confirmButtonText: 'Cerrar',
        confirmButtonColor: '#28a745'
    });
}

function verMasDetalles(nombre, caracteristicas, dimensiones, precauciones, codigo, precio, fabricante, material) {
    Swal.fire({
        title: `<strong>Nombre: ${nombre}</strong>`,
        html: `
            <p><strong>Características:</strong><br>${caracteristicas}</p>
            <p><strong>Dimensiones:</strong><br>${dimensiones}</p>
            <p><strong>Medidas de precaución:</strong><br>${precauciones}</p>
            <p><strong>Código del lote:</strong><br>${codigo}</p>
            <p><strong>Precio:</strong><br>${precio}</p>
            <p><strong>Fabricante:</strong><br>${fabricante}</p>
            <p><strong>Material:</strong><br>${material}</p>
        `,
        showCloseButton: true,
        focusConfirm: false,
        confirmButtonText: 'Cerrar',
        confirmButtonColor: '#28a745'
    });
}


function mostrarDetallesProveedor(nombre, telefono, correo, productos, condicionesPago) {
    Swal.fire({
        title: `<strong>Detalles del Proveedor: ${nombre}</strong>`,
        html: `
            <p><strong>Teléfono:</strong> ${telefono}</p>
            <p><strong>Correo:</strong> ${correo}</p>
            <p><strong>Tipo de Productos Suministrados:</strong> ${productos}</p>
            <p><strong>Condiciones de Pago:</strong> ${condicionesPago}</p>
        `,
        icon: 'info',
        showCloseButton: true,
        focusConfirm: false,
        confirmButtonText: 'Cerrar',
        customClass: {
            popup: 'custom-swal-popup'
        }
    });
}

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

        @if (session('material'))
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: '{{ session('material') }}',
                confirmButtonText: 'Cerrar',

            });
        @endif


        @if (session('proveedor'))
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: '{{ session('proveedor') }}',
                confirmButtonText: 'Cerrar',
            });
        @endif
    });

</script>


</html>
