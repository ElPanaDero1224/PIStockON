<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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


}
