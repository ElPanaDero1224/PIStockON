<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class puestos extends Controller
{
    public function index()
    {
        if (!session()->has('empresaID')) {
            // Si no está iniciada, redirigir a la página de inicio de sesión con un mensaje de error
            return redirect()->route('iniciar')->with('error', 'Debes iniciar sesión para acceder a las categorías.');
        }
    
        // Obtener el ID de la empresa de la sesión
        $empresaID = session('empresaID');

        return view('puestos');
    }


    public function add_puesto_view()
    {
        if (!session()->has('empresaID')) {
            // Si no está iniciada, redirigir a la página de inicio de sesión con un mensaje de error
            return redirect()->route('iniciar')->with('error', 'Debes iniciar sesión para acceder a las categorías.');
        }

        $empresaID = session('empresaID');

        return view('agregarPuesto');

    }


}
