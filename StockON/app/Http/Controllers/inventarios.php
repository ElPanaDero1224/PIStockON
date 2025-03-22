<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class inventarios extends Controller
{
    public function index()
    {
        if (!session()->has('empresaID')) {

            return redirect()->route('iniciar')->with('error', 'Debes iniciar sesión para acceder a la tabla.');
        }    
    
        return view('tabla');
    }

    public function add_inventario_vw()
    {
        if (!session()->has('empresaID')) {

            return redirect()->route('iniciar')->with('error', 'Debes iniciar sesión para acceder a la tabla.');
        }

        return view('formularioAddInventario');

    }


    public function add_productos_vw()
    {
        if (!session()->has('empresaID')) {

            return redirect()->route('iniciar')->with('error', 'Debes iniciar sesión para acceder a la tabla.');
        }
        return view('formularioAddProductos');

    }


    public function verGraficaBarras()
    {
        if (!session()->has('empresaID')) {

            return redirect()->route('iniciar')->with('error', 'Debes iniciar sesión para acceder a la tabla.');
        }
        return view('graficaBarrasView');
    }

    public function verGraficaPuntos()
    {
        if (!session()->has('empresaID')) {

            return redirect()->route('iniciar')->with('error', 'Debes iniciar sesión para acceder a la tabla.');
        }
        return view('graficaPuntosView');
    }
    
}
