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
            session(['empresaID' => $empresa->empresaID]);
            return redirect()->route('menu');
        } else {
            return back()->withErrors(['email' => 'Credenciales incorrectas.']);
        }



    }


    #funcion para registrarse
    public function signin(Request $peticiones){

        $validacion = $peticiones->validate([
            // Validaciones de cada campo
            'nombre' => 'required|alpha:ascii|max:50',
            'email' => 'required|email:rfc,dns',
            'contrasenia' => [
                'required',
                'string',
                'min:8', 
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
            ],
            'telefono' => ['required', 'regex:/^\+?[0-9\s\-\(\)]+$/'],
        ], [
        
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.alpha' => 'El nombre solo puede contener letras.',
            'nombre.max' => 'El nombre no puede tener más de 50 caracteres.',
        
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe tener un formato válido.',
        
            'contrasenia.required' => 'La contraseña es obligatoria.',
            'contrasenia.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'contrasenia.regex' => 'La contraseña debe incluir al menos: 
                - Una letra mayúscula,
                - Una letra minúscula,
                - Un número,
                - Un carácter especial (@, $, !, %, *, ?, &).',
        
            'telefono.required' => 'El número de teléfono es obligatorio.',
            'telefono.regex' => 'El número de teléfono debe ser válido. Ejemplo: +1234567890 o (123) 456-7890.',
        ]);
        

        DB::table('empresa')->insert(
            [
                'nombre'=>$peticiones->input('nombre'),
                'correo'=>$peticiones->input('email'),
                'numTelefono'=>$peticiones->input('telefono'), 
                'contrasenia'=>$peticiones->input('contrasenia'),
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ]
            );

            $empresa = $peticiones->input('nombre');

        session()->flash('registro', '¡La empresa '. $empresa.' Se ha registrado con exito!');

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
