<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use routes\web;


class proveedoresControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = DB::table('proveedores')->get();
        return view('proveedores', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('agregarProveedor');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validacion = $request->validate([
            'nproveedor' => 'required|string|max:50',
            'numtelefono' => 'required|numeric|digits_between:10,15',
            'correo' => 'required|email|max:100',
            'tipoproducto' => 'required|string|max:255',
            'condicionesPago' => 'required|string|max:255',
            'freSuministro' => 'required|string|max:50',
            'horario' => 'required|string|max:50',
            'pais' => 'required|string|max:50',
            'ciudad' => 'required|string|max:50',
            'created_at' => now(), // Fecha de creación
            'updated_at' => now(), 
        ]);
    
        // Insertar los datos en la tabla `proveedores`
        DB::table('proveedores')->insert([
            'nombre' => $request->input('nproveedor'),
            'numTelefono' => $request->input('numtelefono'),
            'correo' => $request->input('correo'),
            'tiposProducto' => $request->input('tipoproducto'),
            'condicionesPago' => $request->input('condicionesPago'),
            'frecuenciaSuministro' => $request->input('freSuministro'),
            'horarioAtencion' => $request->input('horario'),
            'pais' => $request->input('pais'),
            'ciudad' => $request->input('ciudad'),
            'IDempresa' => 1, // Ajusta este valor según tu lógica para asociar con la empresa
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        // Agregar un mensaje de éxito a la sesión
        session()->flash('proveedor', 'El proveedor se ha registrado exitosamente.');
    
        // Redirigir al formulario o a otra página
        return redirect()->route('agregarProveedor');
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
