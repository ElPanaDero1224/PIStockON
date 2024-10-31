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

            <form action="/signin" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre(s):</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Jane" value="{{old('nombre')}}">
                    <small class="text-danger"> {{ $errors->first('nombre') }}</small>
                </div>

                <div class="mb-3">
                    <label for="apellidos" class="form-label">Apellidos:</label>
                    <input type="text" class="form-control" name="apellidos" placeholder="Doe" value="{{old('apellidos')}}">
                    <small class="text-danger"> {{ $errors->first('apellidos') }}</small>
                </div>

                <div class="mb-3">
                    <label for="telefono" class="form-label">Número de teléfono:</label>
                    <input type="tel" class="form-control"  name="telefono" placeholder="442-233-2234" value="{{old('telefono')}}">
                    <small class="text-danger"> {{ $errors->first('telefono') }}</small>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico:</label>
                    <input type="email" class="form-control" name="email" placeholder="user@example.com" value="{{old('email')}}">
                    <small class="text-danger"> {{ $errors->first('email') }}</small>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control"  name="contrasenia" value="{{old('contrasenia')}}">
                    <small class="text-danger"> {{ $errors->first('contrasenia') }}</small>
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
