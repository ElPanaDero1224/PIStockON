@extends('plantillas.cabeza2')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@section('contenido')


<div class="card mx-auto  m-5" style="max-width: 500px;">
    <div class="card-header text-center">
        <h4>Agregar Empleado</h4>
    </div>

    <form method="POST" action="{{ route('addEmpleado') }}" class="p-4">
        @csrf

        <div class="form-group mb-3">
            <label for="nombreEmpleado">Nombre del Empleado:</label>
            <input type="text" class="form-control" name="nombreEmpleado" value="{{ old('nombreEmpleado') }}" placeholder="Ingrese el nombre del empleado">
            <small class="text-danger">{{ $errors->first('nombreEmpleado') }}</small>
        </div>

        <div class="form-group mb-3">
            <label for="apellidoEmpleado">Apellido del Empleado:</label>
            <input type="text" class="form-control" name="apellidoEmpleado" value="{{ old('apellidoEmpleado') }}" placeholder="Ingrese el apellido del empleado">
            <small class="text-danger">{{ $errors->first('apellidoEmpleado') }}</small>
        </div>

        <div class="form-group mb-3">
            <label for="correoEmpleado">Correo Electrónico:</label>
            <input type="email" class="form-control" name="correoEmpleado" value="{{ old('correoEmpleado') }}" placeholder="Ingrese el correo electrónico">
            <small class="text-danger">{{ $errors->first('correoEmpleado') }}</small>
        </div>

        <div class="form-group mb-3">
            <label for="telEmpleado">Numero de telefono:</label>
            <input type="number" class="form-control" name="telEmpleado" value="{{ old('telEmpleado') }}" placeholder="Ingrese el numero telefónico">
            <small class="text-danger">{{ $errors->first('telEmpleado') }}</small>
        </div>

        <div class="form-group mb-4">
            <label for="categoria">Categoría:</label>
            <select class="form-control" name="categoria">
                <option value="1" {{ old('categoria') == 'Administrador' ? 'selected' : '' }}>Administrador</option>
                <option value="2" {{ old('categoria') == 'Proyect Team Manager' ? 'selected' : '' }}>Proyect Team Manager</option>
                <option value="3" {{ old('categoria') == 'CEO' ? 'selected' : '' }}>CEO</option>
                <option value="4" {{ old('categoria') == 'Recursos Humanos' ? 'selected' : '' }}>Recursos Humanos</option>
                <option value="5" {{ old('categoria') == 'Desarrollador' ? 'selected' : '' }}>Desarrollador</option>
                <option value="6" {{ old('categoria') == 'Analista' ? 'selected' : '' }}>Analista</option>
            </select>
            <small class="text-danger">{{ $errors->first('categoria') }}</small>
        </div>
        

        <div class="d-flex justify-content-center gap-3">
            <a href="{{ route('empleados') }}" class="btn btn-danger">
                <strong>Cancelar</strong>
            </a>
            <button type="submit" class="btn" style="background-color:#4CAF50">
                <strong>Añadir</strong>
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
