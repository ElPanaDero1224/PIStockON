<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use routes\web;

class categoriaControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultaCategoria = DB::table('categorias as c')->get();
        return view('categorias', compact('consultaCategoria'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('agregarCategoria');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validacion = $request->validate([
            'nombreCategoria' => 'required|alpha|max:50', // Validación de que la empresa exista
        ]);
    
        // Inserción de datos en la tabla categorias
        DB::table('categorias')->insert([
            'nombre' => $request->input('nombreCategoria'),
            'IDempresa' => 1,
            'created_at' => now(), // Fecha de creación
            'updated_at' => now(), // Fecha de actualización
        ]);

        session()->flash('categoria', 'La categoria se ha agregado');
        return redirect()->route('formularioCategoria'); 
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
        $categoria = DB::table('categorias')->where('categoriaID', $id)->first();
        return view('modificarCategoria', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $validacion = $request->validate([
            'nombreCategoria' => 'required|alpha|max:50', // Validación de que la empresa exista
        ]);

        DB::table('categorias')->where('categoriaID', $id)->update([
            'nombre' => $request->input('nombreCategoria'), // Fecha de creación
            'updated_at' => now(), // Fecha de actualización
        ]);

        return redirect()->route('categorias')->with('categoria', 'La categoria se ha actualizado');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('categorias')->where('categoriaID', $id)->delete();
        return to_route('categorias')->with('exito', 'Categoria eliminada correctamente.');
    }
}
