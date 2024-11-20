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

    public function menu(){
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


        return view ('menu');
    }


    #funcion para registrarse
    public function signin(Request $peticiones){

        $validacion = $peticiones->validate([
            'nombre' => 'required|alpha:ascii|max:50',
            'email'=>'required|email:rfc,dns',
            'contrasenia'=>'required|string|min:5|max:30',
            'telefono' => 'required|numeric|digits:10',

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

    


    public function modProveedor(Request $request) {
        return view('modificarProveedor');
    }

    public function modProveedorPost(Request $request){
        $validacion = $request->validate([
            'nproveedor' => 'required|alpha|max:50',
            'numtelefono' => 'required|numeric|digits_between:10,15',
            'correo' => 'required|email|max:100',
            'tipoproducto' => 'required|string|max:255',
            'condicionesPago' => 'required|string|max:255',
            'freSuministro' => 'required|string|max:50',
            'horario' => 'required|string|max:50',
            'pais' => 'required|string|max:50',
            'ciudad' => 'required|string|max:50',
        ]);
        session()->flash('proveedor', 'El proveedor se ha modificado');
        return redirect()->route('modProveedor'); 

    }

    public function verModCategoria(){
        return view('modificarCategoria');
    }


    public function modificarCategoria(Request $request){

        $validacion = $request->validate([
            'nombreCategoria' => 'required|alpha|max:50',
        ]);

        session()->flash('categoria', 'La categoria se ha actualizado');
        return redirect()->route('verModCategoria'); 
    }

    public function verModificarEmpleado(){
        return view('modificarEmpleado');
    }


    public function modificarEmpleado(Request $request){

        $validacion = $request->validate([
            'nombreEmpleado' => 'required|alpha|max:50',
            'apellidoEmpleado' => 'required|alpha|max:50',
            'telEmpleado' => 'required|numeric|digits_between:10,15',
            'correoEmpleado' => 'required|email|max:100',
        ]);



        session()->flash('empleado', 'El empleado se ha actualizado');
        return redirect()->route('verModificarEmpleado'); 
    }

    public function verModMateriales(){
        return view('modificarMaterial');
    }


    public function modMaterial(Request $peticiones) {
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

        session()->flash('material', 'El material se ha actualizado');
    
        return view('agregarMaterial'); // Redirigir o mostrar vista si es correcto.
    }





}
