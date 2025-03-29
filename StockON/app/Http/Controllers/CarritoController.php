<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class CarritoController extends Controller
{
   //Vista carrito
    public function index()
    {

        $carritos = Carrito::with('producto')->get(); 

        
        return view('carrito', ['carritos' => $carritos]);
    }

   //Agregar item al carrito
    public function addcarrito($productoId, Request $request)
{
    $producto = Producto::find($productoId); // Buscar el producto por ID
    $cantidad = $request->input('cantidad'); // Obtener la cantidad desde el formulario

    if ($producto) {
        $precioUnitario = $producto->precioUnitario;
        $precioTotal = $precioUnitario * $cantidad;

        
        $carrito = new Carrito();
        $carrito->producto_id = $producto->id;
        $carrito->cantidad = $cantidad;
        $carrito->precio = $precioUnitario;
        $carrito->precioTotal = $precioTotal;
        $carrito->fecha = now(); // Fecha de la venta
        $carrito->save();

        
        $producto->cantidad -= $cantidad; // Disminuir la cantidad disponible del producto
        $producto->save();

        return back()->with('success', 'Añadido al carrito correctamente');
    } else {
        // Redirigir con un mensaje de error
        return back()->with('error', 'Producto no encontrado');
    }
}

// Eliminar un item del carrito
public function removeFromCart($carritoId)
{
    $item = Carrito::findOrFail($carritoId);
    
    // Devolver stock al producto
    $producto = Producto::find($item->producto_id);
    $producto->cantidad += $item->cantidad;
    $producto->save();
    
    $item->delete();
    
    return back()->with('success', 'Producto eliminado del carrito');
}

// Actualizar cantidad en el carrito
public function updateCart($carritoId, Request $request)
{
    $item = Carrito::findOrFail($carritoId);
    $nuevaCantidad = $request->input('cantidad');
    $producto = Producto::find($item->producto_id);
    
    $stockDisponible = $producto->cantidad + $item->cantidad;
    
    if ($nuevaCantidad <= $stockDisponible) {
        
        $producto->cantidad = $stockDisponible - $nuevaCantidad;
        $producto->save();
    
        $item->cantidad = $nuevaCantidad;
        $item->precioTotal = $item->precio * $nuevaCantidad;
        $item->save();
        
        return back()->with('success', 'Cantidad actualizada');
    } else {
        return back()->with('error', 'Stock insuficiente');
    }
}

//Finalizar compra del carrito
public function moveToVentas($carritoId)
{
    $item = Carrito::findOrFail($carritoId);
    
    try {
        DB::beginTransaction();
        
        // 1. Registrar la venta
        Venta::create([
            'producto_id' => $item->producto_id,
            'cantidad' => $item->cantidad,
            'precio' => $item->precio,
            'precioTotal' => $item->precioTotal,
            'fecha' => now()
        ]);
        
        // 2. Eliminar del carrito (sin devolver stock)
        $item->delete();
        
        DB::commit();
        
        return back()->with('success', 'Producto vendido exitosamente');
        
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', 'Error al registrar venta: '.$e->getMessage());
    }
}
    
}