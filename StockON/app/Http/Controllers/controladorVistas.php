<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\validaciones;
use Carbon\Carbon;

class controladorVistas extends Controller
{
    public function iniciarS(){
        return view('iniciarsesion');
    }

    public function registrarse(){
        return view('registrarse');
    }

    public function menu()
    {
        if (!session()->has('empresaID')) {
            return redirect()->route('iniciar')->with('error', 'Debes iniciar sesión para acceder al menú.');
        }
        return view('menu');
    }


    public function recuperar(){
        return view ('recuperarContra');
    }


    public function iniciar(Request $peticiones){

        $validacion = $peticiones->validate([
            'email'=>'required|email:rfc,dns',
            'contrasenia'=>'required|string|min:5|max:30',
        ]);

        $empresa = DB::table('empresa')
        ->where('correo', $peticiones->input('email'))
        ->where('contrasenia', $peticiones->input('contrasenia'))
        ->first();

        if ($empresa) {
            // Guardar el ID en la sesión
            session(['empresaID' => $empresa->id]);
            return redirect()->route('menu');
        } else {
            return back()->withErrors(['email' => 'Credenciales incorrectas.']);
        }



    }


    #funcion para registrarse
    public function signin(Request $peticiones){

        $validacion = $peticiones->validate([
            // Validaciones de cada campo
            'nombre' => 'required|alpha:ascii|max:255',
            'numeroRegistro' => 'required|string|max:14',
            'tipo' => 'required|string|max:255',
            'correo' => 'required|email:rfc,dns|max:255',
            'contrasenia' => [
                'required',
                'string',
                'min:8', 
            ],
            'numTelefono' => ['required', 'regex:/^\+?[0-9\s\-\(\)]+$/'],
            'pais' => 'required|string|max:50',
            'region' => 'required|string|max:50',
            'direccion' => 'required|string|max:300',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.alpha' => 'El nombre solo puede contener letras.',
            'nombre.max' => 'El nombre no puede tener más de 255 caracteres.',
    
            'numeroRegistro.required' => 'El campo número de registro es obligatorio.',
            'numeroRegistro.max' => 'El número de registro no puede tener más de 14 caracteres.',
    
            'tipo.required' => 'El campo tipo es obligatorio.',
            'tipo.max' => 'El tipo no puede tener más de 255 caracteres.',
    
            'correo.required' => 'El campo correo electrónico es obligatorio.',
            'correo.email' => 'El correo electrónico debe tener un formato válido.',
            'correo.max' => 'El correo electrónico no puede tener más de 255 caracteres.',
    
            'contrasenia.required' => 'La contraseña es obligatoria.',
            'contrasenia.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'contrasenia.regex' => 'La contraseña debe incluir al menos: 
                - Una letra mayúscula,
                - Una letra minúscula,
                - Un número,
                - Un carácter especial (@, $, !, %, *, ?, &).',
    
            'numTelefono.required' => 'El número de teléfono es obligatorio.',
            'numTelefono.regex' => 'El número de teléfono debe ser válido. Ejemplo: +1234567890 o (123) 456-7890.',
    
            'pais.required' => 'El campo país es obligatorio.',
            'pais.max' => 'El país no puede tener más de 50 caracteres.',
    
            'region.required' => 'El campo región es obligatorio.',
            'region.max' => 'La región no puede tener más de 50 caracteres.',
    
            'direccion.required' => 'El campo dirección es obligatorio.',
            'direccion.max' => 'La dirección no puede tener más de 300 caracteres.',
        ]);
    
        DB::table('empresa')->insert(
            [
                'nombre' => $peticiones->input('nombre'),
                'numeroRegistro' => $peticiones->input('numeroRegistro'),
                'tipo' => $peticiones->input('tipo'),
                'correo' => $peticiones->input('correo'),
                'contrasenia' => $peticiones->input('contrasenia'),
                'numTelefono' => $peticiones->input('numTelefono'),
                'pais' => $peticiones->input('pais'),
                'region' => $peticiones->input('region'),
                'direccion' => $peticiones->input('direccion'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        );
    
        $empresa = $peticiones->input('nombre');
    
        session()->flash('registro', '¡La empresa '. $empresa.' se ha registrado con éxito!');
    
        return view('registrarse');
    }
        
   #recuperacion de contrasenia 
    public function rc(Request $peticiones) {
        $validacion = $peticiones->validate([
            'email'=>'required|email:rfc,dns',
        ]);

        session()->flash('recuperacion', 'Se ha enviado un correo ');
    
        return view('recuperarContra'); // Redirigir o mostrar vista si es correcto.
    }


    public function cerrarSesion()
        {
            // Eliminar todos los datos de la sesión
            session()->flush();

            // Redirigir a la página de inicio de sesión con un mensaje
            return redirect()->route('iniciar')->with('success', 'Has cerrado sesión correctamente.');
        }


}
