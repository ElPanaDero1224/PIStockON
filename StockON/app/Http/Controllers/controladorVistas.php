<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\validaciones;

class controladorVistas extends Controller
{
    public function iniciarS(){
        return view('iniciarsesion');
    }

    public function registrarse(){
        return view('registrarse');
    }

    public function menu(){
        return view('menu');
    }

    public function tabla(){
        return view('tabla');
    }

    public function agregarMaterial(){
        return view('agregarMaterial');
    }

    public function proveedores(){
        return view('proveedores');
    }

    public function agregarProveedor(){
        return view('agregarProveedor');
    }

    public function recuperar(){
        return view ('recuperarContra');
    }


    public function iniciar(Request $peticiones){


        $validacion = $peticiones->validate([
            'email'=>'required|email:rfc,dns',
            'contrasenia'=>'required|string|min:5|max:30',
        ]);


        return view ('menu');
    }


    public function signin(Request $peticiones){

        $validacion = $peticiones->validate([
            'nombre' => 'required|alpha:ascii|max:50',
            'apellidos' => 'required|alpha:ascii|max:50',
            'email'=>'required|email:rfc,dns',
            'contrasenia'=>'required|string|min:5|max:30',
            'telefono' => 'required|numeric|digits:10',

        ]);

        return view('registrarse');
    }
    

    public function addmaterial(Request $peticiones) {
        $validacion = $peticiones->validate([
            'nombreProducto' => 'required|alpha|max:50',
            'caracteristicasProducto' => 'required|string|max:255',
            'ancho' => 'required|numeric|min:0',
            'largo' => 'required|numeric|min:0',
            'alto' => 'required|numeric|min:0',
            'precaucion' => 'required|string|max:255',
            'codigoLote' => 'required|numeric|digits:12',
            'precio' => 'required|numeric|min:0',
            'fabricante' => 'required|string|max:255',
            'material' => 'required|string|max:100',
        ]);
    
        return view('agregarMaterial'); // Redirigir o mostrar vista si es correcto.
    }
    



}
