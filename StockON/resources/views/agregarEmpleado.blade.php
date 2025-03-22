@extends('plantillas.cabeza2')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@section('contenido')

<div class="card mx-auto m-5" style="max-width: 500px;">
    <div class="card-header text-center">
        <h4>Agregar Empleado</h4>
    </div>

    <form method="POST" action="{{ route('addEmpleado') }}" class="p-4" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label for="nombreEmpleado">Nombre del Empleado:</label>
            <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" placeholder="Ingrese el nombre del empleado">
            <small class="text-danger">{{ $errors->first('nombre') }}</small>
        </div>

        <div class="form-group mb-3">
            <label for="apellidoEmpleado">Apellido del Empleado:</label>
            <input type="text" class="form-control" name="apellido" value="{{ old('apellido') }}" placeholder="Ingrese el apellido del empleado">
            <small class="text-danger">{{ $errors->first('apellido') }}</small>
        </div>

        <div class="form-group mb-3">
            <label for="correoEmpleado">Correo Electrónico:</label>
            <input type="email" class="form-control" name="correo" value="{{ old('correo') }}" placeholder="Ingrese el correo electrónico">
            <small class="text-danger">{{ $errors->first('correo') }}</small>
        </div>

        <div class="form-group mb-3">
            <label for="telEmpleado">Número de teléfono:</label>
            <input type="text" class="form-control" name="telefono" value="{{ old('telefono') }}" placeholder="Ingrese el número telefónico">
            <small class="text-danger">{{ $errors->first('telefono') }}</small>
        </div>

        <div class="form-group mb-3">
            <label for="horario">Horario:</label>
            <input type="text" class="form-control" name="horario" value="{{ old('horario') }}" placeholder="Ingrese el horario">
            <small class="text-danger">{{ $errors->first('horario') }}</small>
        </div>

        <div class="form-group mb-3">
            <label for="genero">Género:</label>
            <select class="form-control" name="genero">
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
                <option value="Otro">Otro</option>
            </select>
            <small class="text-danger">{{ $errors->first('genero') }}</small>
        </div>

        <div class="form-group mb-3">
            <label for="area">Área:</label>
            <input type="text" class="form-control" name="area" value="{{ old('area') }}" placeholder="Ingrese el área">
            <small class="text-danger">{{ $errors->first('area') }}</small>
        </div>

        <div class="form-group mb-3">
            <label for="salario">Salario:</label>
            <input type="number" step="0.01" class="form-control" name="salario" value="{{ old('salario') }}" placeholder="Ingrese el salario">
            <small class="text-danger">{{ $errors->first('salario') }}</small>
        </div>

        <div class="form-group mb-3">
            <label for="contrasenia">Contraseña:</label>
            <input type="password" class="form-control" name="contrasenia" placeholder="Ingrese la contraseña">
            <small class="text-danger">{{ $errors->first('contrasenia') }}</small>
        </div>

        <div class="form-group mb-3">
            <label for="id_empresa">ID de la Empresa:</label>
            <input type="text" class="form-control" name="id_empresa" value="{{ old('id_empresa') }}" placeholder="Ingrese el ID de la empresa">
            <small class="text-danger">{{ $errors->first('id_empresa') }}</small>
        </div>

        <div class="form-group mb-3">
            <label for="id_puesto">ID del Puesto:</label>
            <input type="text" class="form-control" name="id_puesto" value="{{ old('id_puesto') }}" placeholder="Ingrese el ID del puesto">
            <small class="text-danger">{{ $errors->first('id_puesto') }}</small>
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