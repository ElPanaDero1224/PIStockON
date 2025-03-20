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
    

        $empresaID = session('empresaID');
    
    
        return view('tabla');
    }
    
}
