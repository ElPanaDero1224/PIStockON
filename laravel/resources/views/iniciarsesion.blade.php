@extends('plantillas.cabeza')

<div class="fixed-top vh-100 vw-100" style="
    background: linear-gradient(rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.3)), url({{ asset('img/logInBackground.png') }}) center/cover;
    z-index: -1;">
</div>

@section('titulo', 'Iniciar Sesion')

@section('contenido')

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="row shadow-lg p-4 rounded bg-white" style="max-width: 800px; border-radius: 10px;">
        
        <!-- Columna de Imagen -->
        <div class="col-md-6 d-none d-md-block">
            <img src={{asset('img/main1.png')}} alt="Stock Image" class="img-fluid rounded">
        </div>

        <!-- Columna del Formulario -->
        <div class="col-md-6">
            <div class="text-center">
                <img src="{{ asset('img/txt.png') }}" alt="Logo Stock ON" class="img-fluid" style="max-width: 150px;">
            </div>
            
            <h4 class="text-center mb-4 text-dark">Iniciar Sesión</h4>
            
            <form action="{{route('in')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label text-dark">Correo electrónico:</label>
                    <input type="email" class="form-control" name="email" placeholder="user@example.com" value="{{old('email')}}">
                    <small class="text-danger"> {{ $errors->first('email') }}</small>
                </div>
                
                <div class="mb-3">
                    <label for="password" class="form-label text-dark">Contraseña:</label>
                    <input type="password" class="form-control" name="contrasenia" value="{{old('contrasenia')}}">
                    <small class="text-danger"> {{ $errors->first('contrasenia') }}</small>
                </div>
                
                <div class="d-grid">
                    <button type="submit" class="btn btn-warning">Iniciar sesión</button>
                </div>
            </form>

            <div class="text-center mt-3">
                <span class="text-dark">¿Has olvidado tu contraseña? </span>
                <a href="{{route('recuperar')}}" class="text-warning">Haz clic aquí.</a>
                <br>
                <span class="text-dark">¿No tienes una cuenta? Regístrate </span>
                <a href="{{route('registro')}}" class="text-warning"> aquí.</a>
            </div>
        </div>
    </div>
</div>

@endsection
