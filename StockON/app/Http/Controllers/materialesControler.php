<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use routes\web;

class materialesControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultaMaterial = DB::table('materiales')->get();
        return view('tabla', compact('consultaMaterial'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('agregarMaterial');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de los datos
        $validacion = $request->validate([
            'nombreProducto' => 'required|alpha|max:50',
            'peso' => 'required|numeric|min:0',
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
    
        // Inserción en la base de datos
        DB::table('materiales')->insert([
            'nombre' => $request->input('nombreProducto'),
            'peso' => $request->input('peso'),
            'disponibilidad' => true, // Disponibilidad por defecto en true
            'precio' => $request->input('precio'),
            'caracteristicas' => $request->input('caracteristicasProducto'),
            'ancho' => $request->input('ancho'),
            'largo' => $request->input('largo'),
            'alto' => $request->input('alto'),
            'precaucion' => $request->input('precaucion'),
            'codigoLote' => $request->input('codigoLote'),
            'fabricante' => $request->input('fabricante'),
            'material' => $request->input('material'),
            'IDempresa' => 1,
            'IDproveedor' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        // Mensaje de éxito
        session()->flash('material', 'El material se ha registrado exitosamente.');
    
        // Redirigir a una vista o a la lista de materiales
        return redirect()->route('agregarMaterial'); // Cambiar 'tabla' por la ruta de tu lista de materiales
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
