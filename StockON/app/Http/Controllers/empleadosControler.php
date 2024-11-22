<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use routes\web;

class empleadosControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultarEmpleados = DB::table("empleados as e")
        ->join("categorias as c", "c.categoriaID", "=", "e.IDcategoria") 
        ->select('e.empleadoID', 'e.nombre', 'e.apellido', 'e.correo', 'e.numTelefono', 'c.nombre as ncategoria') 
        ->get();
        return view('empleados', compact('consultarEmpleados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = DB::table("categorias")->get();
        return view('agregarEmpleado', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validacion = $request->validate([
            'nombreEmpleado' => 'required|alpha|max:50',
            'apellidoEmpleado' => 'required|alpha|max:50',
            'telEmpleado' => 'required|numeric|digits_between:10,15',
            'correoEmpleado' => 'required|email|max:100',
        ]);

        DB::table('empleados')->insert([
            'nombre' => $request->input('nombreEmpleado'),
            'apellido' => $request->input('apellidoEmpleado'),
            'numTelefono' => $request->input('telEmpleado'),
            'correo' => $request->input('correoEmpleado'),
            'IDcategoria' => $request->input('categoria'),
            'IDempresa'=> 1,
            'created_at' => now(), // Fecha de creación
            'updated_at' => now(), // Fecha de actualización
        ]);

        $nombre = $request->input('nombreEmpleado');


        session()->flash('empleado', 'El empleado '.$nombre.' se ha agregado');
        return redirect()->route('agregarEmpleado'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $categorias = DB::table("categorias")->get();

        $empleados = DB::table('empleados')->where('empleadoID', $id)->first();

        return view('modificarEmpleado', compact('empleados'), compact('categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $validacion = $request->validate([
            'nombreEmpleado' => 'required|alpha|max:50',
            'apellidoEmpleado' => 'required|alpha|max:50',
            'telEmpleado' => 'required|numeric|digits_between:10,15',
            'correoEmpleado' => 'required|email|max:100',
        ]);

        DB::table('empleados')->where('empleadoID', $id)->update([
            'nombre' => $request->input('nombreEmpleado'),
            'apellido' => $request->input('apellidoEmpleado'),
            'numTelefono' => $request->input('telEmpleado'),
            'correo' => $request->input('correoEmpleado'),
            'IDcategoria' => $request->input('categoria'),
            'IDempresa'=> 1,
            'updated_at' => now(), // Fecha de actualización
        ]);

        $nombre = $request->input('nombreEmpleado');
        return redirect()->route('empleados')->with('empleado', 'El empleado '.$nombre.' se ha actualizado');







    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        {
            DB::table('empleados')->where('empleadoID', $id)->delete();
            return to_route('empleados')->with('empleado', 'empleado eliminado correctamente.');
        }
    }
}
