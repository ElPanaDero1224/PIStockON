@extends('plantillas.cabeza')

@section('contenido')


    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="row shadow-lg p-4 rounded" style="max-width: 800px;">

            <!-- Columna de Imagen -->
            <div class="col-md-6 d-none d-md-block">
                <img src="{{ asset('img/signUP.png') }}" alt="Stock Image" class="img-fluid">
            </div>

            <!-- Columna del Formulario -->
            <div class="col-md-6">
                <!-- Imagen del logo "Stock ON" en lugar del título de texto -->
                <div class="text-center mb-2">
                    <img src="{{ asset('img/logo-stockon.png') }}" alt="Logo Stock ON" class="img-fluid" style="max-width: 150px;">
                </div>
                <h4 class="text-center mb-4">Registrarse</h4>

                <form action="/ruta-de-registro" method="POST">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre(s):</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Jane" required>
                    </div>
                    <div class="mb-3">
                        <label for="apellidos" class="form-label">Apellidos:</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Doe" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Número de teléfono:</label>
                        <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="442-233-2234" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="user@example.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirmar contraseña:</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">Registrarse</button>
                    </div>
                </form>
                
                <div class="text-center mt-3">
                    <span class="text-muted">¿Ya tienes cuenta? </span>
                    <a href="{{ route('iniciar')}}" class="text-primary">Inicia sesión</a>
                </div>
            </div>
        </div>
    </div>

@endsection
