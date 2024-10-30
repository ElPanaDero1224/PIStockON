@extends('plantillas.cabeza')

@section('css')
    @vite('resources/css/registro.css')
@endsection

@section('contenido')

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="row shadow-lg p-5 rounded bg-white w-100" style="max-width: 800px;">


        <div class="col-md-5 d-none d-md-block p-0">
            <img src="{{ asset('img/signUP.png') }}" alt="Stock Image" 
                 class="img-fluid rounded-start" 
                 style="height: 100%; object-fit: contain; padding: 20px;">
        </div>


        <div class="col-md-7 p-4">
            <div class="text-center mb-3">
                <img src="{{ asset('img/logo-stockon.png') }}" 
                     alt="Logo Stock ON" 
                     class="img-fluid" 
                     style="max-width: 120px;">
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
                    <button type="submit" class="btn btn-warning btn-lg">Registrarse</button>
                </div>
            </form>

            <div class="text-center mt-3">
                <span class="text-muted">¿Ya tienes cuenta? </span>
                <a href="{{ route('iniciar')}}" class="text-decoration-none text-primary">Inicia sesión</a>
            </div>
        </div>
    </div>
</div>

@endsection
