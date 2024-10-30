
@extends('plantillas.cabeza')

@section('titulo', 'Iniciar Sesion')

@section('contenido')

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="row shadow-lg p-4 rounded" style="max-width: 800px;">

            <!-- Columna de Imagen -->
            <div class="col-md-6 d-none d-md-block">
                <!-- Ruta de la imagen actualiza 'image.png' a la correcta en tu proyecto -->
                <img src={{asset('img/main1.png')}} alt="Stock Image" class="img-fluid">
            </div>

            <!-- Columna del Formulario -->
            <div class="col-md-6">

                <div class="text-center">
                    <img src="{{ asset('img/txt.png') }}" alt="Logo Stock ON" class="img-fluid" style="max-width: 150px;">
                </div>
                
                <h4 class="text-center mb-4">Iniciar Sesión</h4>
                <form action="/ruta-de-login" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="user@example.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-warning">Iniciar sesión</button>
                    </div>
                </form>
                <div class="text-center mt-3">
                    <span class="text-muted">Has olvidado tu contraseña? </span>
                    <a href="/" class="text-primary">Haz clic aquí.</a>
                    <br>
                    <span class="text-muted">¿No tienes una cuenta? Regístrate </span>
                    <a href="{{route('registro')}}" class="text-primary"> aquí.</a>

                </div>
            </div>
        </div>
    </div>

@endsection