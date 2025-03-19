@extends('plantillas.cabeza')

<div class="fixed-top vh-100 vw-100" style="
    background: linear-gradient(rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.3)), url({{ asset('img/logInBackground.png') }}) center/cover;
    z-index: -1;">
</div>

@section('css')
    @vite('resources/css/registro.css')
@endsection

@section('contenido')

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="row shadow-lg p-5 rounded bg-white w-100" style="max-width: 800px; max-height: 90vh; overflow-y: auto;">

        <div class="col-md-5 d-none d-md-block p-0">
            <img src="{{ asset('img/signUP.png') }}" alt="Stock Image" 
                 class="img-fluid rounded-start" 
                 style="height: 100%; object-fit: contain; padding: 20px;">
        </div>

        <div class="col-md-7 p-4">
            <div class="text-center mb-3">
                <img src="{{ asset('img/txt.png') }}" 
                     alt="Logo Stock ON" 
                     class="img-fluid" 
                     style="max-width: 120px;">
            </div>

            <h4 class="text-center mb-4">Registrarse</h4>

            <form action="/signin" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="{{old('nombre')}}">
                    <small class="text-danger"> {{ $errors->first('nombre') }}</small>
                </div>

                <div class="mb-3">
                    <label for="numeroRegistro" class="form-label">Número de Registro:</label>
                    <input type="text" class="form-control" name="numeroRegistro" placeholder="Número de Registro" value="{{old('numeroRegistro')}}">
                    <small class="text-danger"> {{ $errors->first('numeroRegistro') }}</small>
                </div>

                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo:</label>
                    <input type="text" class="form-control" name="tipo" placeholder="Tipo" value="{{old('tipo')}}">
                    <small class="text-danger"> {{ $errors->first('tipo') }}</small>
                </div>

                <div class="mb-3">
                    <label for="correo" class="form-label">Correo electrónico:</label>
                    <input type="email" class="form-control" name="correo" placeholder="Correo electrónico" value="{{old('correo')}}">
                    <small class="text-danger"> {{ $errors->first('correo') }}</small>
                </div>

                <div class="mb-3">
                    <label for="contrasenia" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" name="contrasenia" value="{{old('contrasenia')}}">
                    <small class="text-danger"> {{ $errors->first('contrasenia') }}</small>
                </div>

                <div class="mb-3">
                    <label for="numTelefono" class="form-label">Número de teléfono:</label>
                    <input type="tel" class="form-control" name="numTelefono" placeholder="Número de teléfono" value="{{old('numTelefono')}}">
                    <small class="text-danger"> {{ $errors->first('numTelefono') }}</small>
                </div>

                <div class="mb-3">
                    <label for="pais" class="form-label">País:</label>
                    <input type="text" class="form-control" name="pais" placeholder="País" value="{{old('pais')}}">
                    <small class="text-danger"> {{ $errors->first('pais') }}</small>
                </div>

                <div class="mb-3">
                    <label for="region" class="form-label">Región:</label>
                    <input type="text" class="form-control" name="region" placeholder="Región" value="{{old('region')}}">
                    <small class="text-danger"> {{ $errors->first('region') }}</small>
                </div>

                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección:</label>
                    <input type="text" class="form-control" name="direccion" placeholder="Dirección" value="{{old('direccion')}}">
                    <small class="text-danger"> {{ $errors->first('direccion') }}</small>
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