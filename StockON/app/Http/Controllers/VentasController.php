<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VentasController extends Controller
{

    public function index()
    {
        
        $ventas = Venta::with('producto')->get(); 

        
        return view('ventas', compact('ventas'));

        
    }

  
    public function venderProducto($productoId, Request $request)
{
    $producto = Producto::find($productoId); 
    $cantidad = $request->input('cantidad'); 

    if ($producto) {
        $precioUnitario = $producto->precioUnitario;
        $precioTotal = $precioUnitario * $cantidad;

       
        $venta = new Venta();
        $venta->producto_id = $producto->id;
        $venta->cantidad = $cantidad;
        $venta->precio = $precioUnitario;
        $venta->precioTotal = $precioTotal;
        $venta->fecha = now(); 
        $venta->save();

        
        $producto->cantidad -= $cantidad; 
        $producto->save();

        return back()->with('success', 'Venta realizada correctamente');
    } else {
        
        return back()->with('error', 'Producto no encontrado');
    }
}

}
