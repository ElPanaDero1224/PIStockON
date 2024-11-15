@extends('plantillas.cabeza2')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@section('contenido')


<div class="card mx-auto  m-5" style="max-width: 500px;">
    <div class="card-header text-center">
        <h4>Modificar Empleado</h4>
    </div>

    <form method="POST" action="{{ route('modificarEmpleado') }}" class="p-4">
        @csrf

        <div class="form-group mb-3">
            <label for="nombreEmpleado">Nombre del Empleado:</label>
            <input type="text" class="form-control" name="nombreEmpleado" value="Isabel" placeholder="Ingrese el nombre del empleado">
            <small class="text-danger">{{ $errors->first('nombreEmpleado') }}</small>
        </div>

        <div class="form-group mb-3">
            <label for="apellidoEmpleado">Apellido del Empleado:</label>
            <input type="text" class="form-control" name="apellidoEmpleado" value="Villagran Olvera" placeholder="Ingrese el apellido del empleado">
            <small class="text-danger">{{ $errors->first('apellidoEmpleado') }}</small>
        </div>

        <div class="form-group mb-3">
            <label for="correoEmpleado">Correo Electrónico:</label>
            <input type="email" class="form-control" name="correoEmpleado" value="isa@gmail.com" placeholder="Ingrese el correo electrónico">
            <small class="text-danger">{{ $errors->first('correoEmpleado') }}</small>
        </div>

        <div class="form-group mb-3">
            <label for="telEmpleado">Numero de telefono:</label>
            <input type="number" class="form-control" name="telEmpleado" value="233456423243" placeholder="Ingrese el numero telefónico">
            <small class="text-danger">{{ $errors->first('telEmpleado') }}</small>
        </div>

        <div class="form-group mb-4">
            <label for="categoria">Categoría:</label>
            <select class="form-control" name="categoria">
                <option value="Administrador">Seleccione una categoría</option>
                <option value="Administrador" {{ old('categoria') == 'Administrador' ? 'selected' : '' }}>Administrador</option>
                <option value="Proyect Team Manager" {{ old('categoria') == 'Proyect Team Manager' ? 'selected' : '' }}>Proyect Team Manager</option>
                <option value="CEO" {{ old('categoria') == 'CEO' ? 'selected' : '' }}>CEO</option>
                <option value="Recursos Humanos" {{ old('categoria') == 'Recursos Humanos' ? 'selected' : '' }}>Recursos Humanos</option>
                <option value="Desarrollador" {{ old('categoria') == 'Desarrollador' ? 'selected' : '' }}>Desarrollador</option>
                <option value="Analista" {{ old('categoria') == 'Analista' ? 'selected' : '' }}>Analista</option>
            </select>
            <small class="text-danger">{{ $errors->first('categoria') }}</small>
        </div>
        

        <div class="d-flex justify-content-center gap-3">
            <a href="{{ route('empleados') }}" class="btn btn-danger">
                <strong>Cancelar</strong>
            </a>
            <button type="submit" class="btn" style="background-color:#afcae3">
                <strong>Actualizar</strong>
            </button>
        </div>
    </form>
</div>

<script>
    
    @if (session('empleado'))
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: '{{ session('empleado') }}',
                confirmButtonText: 'Cerrar',
            });
    @endif
</script>

@endsection