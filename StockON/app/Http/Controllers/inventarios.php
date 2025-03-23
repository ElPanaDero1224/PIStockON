<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

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

    #funciones de la vista para agregar inventarios

    public function add_inventario_vw()
    {
        if (!session()->has('empresaID')) {
            return redirect()->route('iniciar')->with('error', 'Debes iniciar sesión para acceder a la tabla.');
        }
        $tipo_inventario = DB::table('tipo_inventarios')
        ->get();
        return view('formularioAddInventario', compact('tipo_inventario'));
    }

    #para guardar los inventarios

    public function store_inventario(Request $request)
    {
        // Verificar si la sesión tiene empresaID
        if (!session()->has('empresaID')) {
            return redirect()->route('iniciar')->with('error', 'Debes iniciar sesión para acceder a la tabla.');
        }
    
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'id_tipoInventario' => 'required|exists:tipo_inventarios,id',
        ]);
    
        // Insertar el nuevo inventario en la base de datos
        DB::table('inventarios')->insert([
            'nombre' => $request->nombre,
            'id_empresa' => session('empresaID'), // Obtener el ID de la empresa desde la sesión
            'id_tipoInventario' => $request->id_tipoInventario,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        // Redirigir con un mensaje de éxito
        return redirect()->route('addInventario')->with('inventario', 'Inventario agregado correctamente.');
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
