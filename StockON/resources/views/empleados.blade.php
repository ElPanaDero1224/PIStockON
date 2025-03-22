@extends('plantillas.cabeza2')

@section('css')
    @vite('resources/css/menu.css')
    <style>
        .empleados-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            margin: 2rem auto;
            max-width: 1200px;
        }

        .header-actions {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .btn-custom {
            padding: 0.8rem 1.5rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-add {
            background: linear-gradient(135deg, #4CAF50, #45a049);
            color: white;
            border: none;
        }

        .btn-categories {
            background: linear-gradient(135deg, #2196F3, #1976D2);
            color: white;
            border: none;
        }

        .btn-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        .table-custom {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 0.75rem;
        }
        

        .table-custom thead th {
            background-color: #b7cde4;
            color: #2d3748;
            font-weight: 600;
            padding: 1rem;
            border-bottom: 2px solid #e2e8f0;
        }

        .table-custom tbody tr {
            background-color: white;
            transition: all 0.3s ease;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .table-custom tbody tr:hover {
            transform: translateX(4px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .table-custom td {
            padding: 1rem;
            vertical-align: middle;
            border-top: 1px solid #e2e8f0;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .btn-action {
            padding: 0.5rem 1rem;
            border-radius: 6px;
            font-size: 0.875rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.2s ease;
        }

        .btn-edit {
            background: #e3f2fd;
            color: #1976D2;
            border: 1px solid #90caf9;
        }

        .btn-delete {
            background: #ffebee;
            color: #d32f2f;
            border: 1px solid #ef9a9a;
        }

        .btn-action:hover {
            filter: brightness(0.95);
        }
    </style>
@endsection

@section('contenido')
    @if (session('empleado'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: '{{ session('empleado') }}',
            confirmButtonText: 'Cerrar',
            customClass: {
                confirmButton: 'btn-custom btn-add'
            }
        });
    </script>
    @endif

    <div class="empleados-container">
        <div class="header-actions">
            <a href="{{route('addEmpleado')}}" class="btn-custom btn-add">
                <i class="fas fa-user-plus"></i>
                Agregar empleado
            </a>
            <a href="{{route('puestos')}}" class="btn-custom btn-categories">
                <i class="fas fa-tags"></i>
                Ver puestos
            </a>
        </div>

        <table class="table-custom">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Categoría</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Juan Pérez</td>
                    <td>Gómez</td>
                    <td>juan@empresa.com</td>
                    <td>555-1234</td>
                    <td>Desarrollo</td>
                    <td>
                        <div class="action-buttons">
                            <a href="#" class="btn-action btn-edit">
                                <i class="fas fa-edit"></i>
                                Editar
                            </a>
                            <form id="form-eliminar-1" action="#" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                            <button type="button" class="btn-action btn-delete" onclick="confirmarEliminacion(1)">
                                <i class="fas fa-trash-alt"></i>
                                Eliminar
                            </button>
                        </div>
                    </td>
                </tr>
                <!-- Más filas... -->
            </tbody>
        </table>
    </div>
@endsection

<script>
    function confirmarEliminacion(id) {
        Swal.fire({
            title: '¿Confirmar eliminación?',
            text: "Esta acción no se puede deshacer",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d32f2f',
            cancelButtonColor: '#6b7280',
            confirmButtonText: '<i class="fas fa-trash"></i> Eliminar',
            cancelButtonText: 'Cancelar',
            customClass: {
                confirmButton: 'btn-action btn-delete',
                cancelButton: 'btn-action btn-edit'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(`form-eliminar-${id}`).submit();
            }
        });
    }
</script>