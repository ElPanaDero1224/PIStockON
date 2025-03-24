<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class inventarios extends Controller
{
    public function index($id_inventario = null)
    {
        // Verificar si la sesión tiene empresaID
        if (!session()->has('empresaID')) {
            return redirect()->route('iniciar')->with('error', 'Debes iniciar sesión para acceder a la tabla.');
        }
    
        // Obtener inventarios de tipo "Venta" (id_tipoInventario = 1)
        $inv_ventas = DB::table('inventarios')
            ->where('id_empresa', session('empresaID'))
            ->where('id_tipoInventario', 1)
            ->get();
    
        // Obtener inventarios de tipo "Compra" (id_tipoInventario = 2)
        $inv_compras = DB::table('inventarios')
            ->where('id_empresa', session('empresaID'))
            ->where('id_tipoInventario', 2)
            ->get();
    
        // Obtener productos según el id_inventario seleccionado
        $productos = collect(); // Inicializar como una colección vacía
    
        if ($id_inventario) {
            $productos = DB::table('productos')
                ->where('id_inventario', $id_inventario)
                ->get();
        }
    
        // Pasar todas las variables a la vista
        return view('tabla', compact('inv_ventas', 'inv_compras', 'productos', 'id_inventario'));
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

    
    #para los profuctos
    public function add_productos_vw($id_inventario)
    {
        if (!session()->has('empresaID')) {

            return redirect()->route('iniciar')->with('error', 'Debes iniciar sesión para acceder a la tabla.');
        }
        return view('formularioAddProductos', compact('id_inventario'));

    }

    #para agregar los productos a su respectivo inventario

    public function store_productos(Request $request)
    {
        // Verificar si la sesión tiene empresaID
        if (!session()->has('empresaID')) {
            return redirect()->route('iniciar')->with('error', 'Debes iniciar sesión para acceder a la tabla.');
        }
    
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:100',
            'precioUnitario' => 'required|numeric|min:0',
            'dimensiones' => 'nullable|string',
            'precauciones' => 'nullable|string',
            'cantidad' => 'required|integer|min:0',
            'caracteristicas' => 'nullable|string',
            'codigoLote' => 'required|string|max:200',
            'material' => 'nullable|string',
            'id_inventario' => 'required|exists:inventarios,id',
        ]);
    
        // Insertar el nuevo producto en la base de datos
        DB::table('productos')->insert([
            'nombre' => $request->nombre,
            'precioUnitario' => $request->precioUnitario,
            'dimensiones' => $request->dimensiones,
            'precauciones' => $request->precauciones,
            'cantidad' => $request->cantidad,
            'caracteristicas' => $request->caracteristicas,
            'codigoLote' => $request->codigoLote,
            'material' => $request->material,
            'id_inventario' => $request->id_inventario,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        // Redirigir a la ruta addProductos con el id_inventario
        return redirect()->route('addProductos', ['id_inventario' => $request->id_inventario])
            ->with('success', 'Producto agregado correctamente.');
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
