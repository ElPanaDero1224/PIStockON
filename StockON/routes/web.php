<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controladorVistas;
use App\Http\Controllers\inventarios;
use App\Http\Controllers\proveedoresControler;
use App\Http\Controllers\empleadosControler;
use App\Http\Controllers\puestos;





Route::get('/',[controladorVistas::class, 'iniciarS'])->name('iniciar');
Route::get('/cerrarSesion', [controladorVistas::class, 'cerrarSesion'])->name('cerrarSesion');
Route::get('/registro',[controladorVistas::class, 'registrarse'])->name('registro');
Route::get('/menu',[controladorVistas::class, 'menu'])->name('menu');


#ruta para el menu
Route::get('/inventarios/{id_inventario?}',[inventarios::class, 'index'])->name('tabla');
Route::post('/store_inventario', [inventarios::class, 'store_inventario'])->name('store_inventario');

#ruta para el formulario para agregar un inventario
Route::get('/agregarInventarios',[inventarios::class, 'add_inventario_vw'])->name('addInventario');
Route::get('/agregarProductos/{id_inventario?}',[inventarios::class, 'add_productos_vw'])->name('addProductos');
Route::post('/store_productos', [inventarios::class, 'store_productos'])->name('store_productos');
// Mostrar formulario de edición
Route::get('/update_productos/{id_inventario}/{id}', [inventarios::class, 'update_productos_view'])->name('updateProductos');

#eliminacion
Route::delete('/eliminarProductos/{id_inventario}/{id}', [inventarios::class, 'delete_productos'])->name('dropProducto');


// Procesar actualización
Route::put('/update_productos/{id_inventario}/{id}', [inventarios::class, 'update_productos'])->name('update_productos');


#ruta para la grafica
Route::get('/verGraficasBarras', [inventarios::class, 'verGraficaBarras'])->name('verGraficaBarras');
Route::get('/verGraficasPuntos', [inventarios::class, 'verGraficaPuntos'])->name('verGraficaPuntos');


#categorias
Route::get('/puestos', [puestos::class, 'index'])->name('puestos');
Route::get('/agregarPuestos', [puestos::class, 'add_puesto_view'])->name('addPuesto');


#vista para ver la lista de los proveedores
Route::get('/proveedores', [proveedoresControler::class, 'index'])->name('proveedores');

#vista para agregar proveedor
Route::get('/agregarProveedor', [proveedoresControler::class, 'create'])->name('agregarProveedor');

Route::get('/recuperar', [controladorVistas::class, 'recuperar'])->name('recuperar');


#vista de la tabla de empleados
Route::get('/empleados', [empleadosControler::class,'index'])->name('empleados');

#Vista del formulario para agregar un empleado

route::get('/agregarEmpleados', [empleadosControler::class, 'create'])->name('addEmpleado');


//metodos para enviar


Route::post('/recuperacion', [controladorVistas::class, 'rc'])->name('recuperacion');

Route::post('/iniciar', [controladorVistas::class, 'iniciar'])->name('in');

Route::post('/signin', [controladorVistas::class, 'signin'])->name('signin');



Route::post('/addproveedor', [proveedoresControler::class, 'store'])->name('addProveedor');

Route::post('/modidifcarProveedorPublicar', [controladorVistas::class, 'modProveedorPost'])->name('modProveedorPost');






#metodos para realizar actualizaciones y eliminaciones 

#categorias


#empleados
Route::get('/verModificarEmpleado/{id}/edit', [empleadosControler::class,'edit'])->name('verModEmpleado');
Route::put('/empleados/{id}', [empleadosControler::class, 'update'])->name('actualizarEmpleado');
Route::delete('/eliminarEmpleado/{id}', [empleadosControler::class, 'destroy'])->name('rutaEliminarEmpleado');

#proveedor
Route::get('/verModificarProveedor/{id}/edit', [proveedoresControler::class,'edit'])->name('modProveedor');
Route::put('/proveedores/{id}', [proveedoresControler::class, 'update'])->name('actualizarProveedor');
#delete
Route::delete('/eliminarProveedor/{id}', [proveedoresControler::class, 'destroy'])->name('rutaEliminarProveedor');

