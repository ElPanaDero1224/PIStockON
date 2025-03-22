<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controladorVistas;
use App\Http\Controllers\inventarios;
use App\Http\Controllers\proveedoresControler;
use App\Http\Controllers\empleadosControler;
use App\Http\Controllers\categoriaControler;





Route::get('/',[controladorVistas::class, 'iniciarS'])->name('iniciar');
Route::get('/cerrarSesion', [controladorVistas::class, 'cerrarSesion'])->name('cerrarSesion');
Route::get('/registro',[controladorVistas::class, 'registrarse'])->name('registro');
Route::get('/menu',[controladorVistas::class, 'menu'])->name('menu');


#ruta para el menu
Route::get('/inventarios',[inventarios::class, 'index'])->name('tabla');

#ruta para el formulario para agregar un inventario
Route::get('/agregarInventarios',[inventarios::class, 'add_inventario_vw'])->name('addInventario');
Route::get('/agregarProductos',[inventarios::class, 'add_productos_vw'])->name('addProductos');

#ruta para la grafica
Route::get('/verGraficasBarras', [inventarios::class, 'verGraficaBarras'])->name('verGraficaBarras');
Route::get('/verGraficasPuntos', [inventarios::class, 'verGraficaPuntos'])->name('verGraficaPuntos');



#vista para ver la lista de los proveedores
Route::get('/proveedores', [proveedoresControler::class, 'index'])->name('proveedores');

#vista para agregar proveedor
Route::get('/agregarProveedor', [proveedoresControler::class, 'create'])->name('agregarProveedor');

Route::get('/recuperar', [controladorVistas::class, 'recuperar'])->name('recuperar');


#vista de la tabla de empleados
Route::get('/empleados', [empleadosControler::class,'index'])->name('empleados');

#Vista del formulario para agregar un empleado

route::get('/formularioEmpleados', [empleadosControler::class, 'create'])->name('agregarEmpleado');

route::get('/categorias', [categoriaControler::class,'index'])->name('categorias');

Route::get('/formularioCategoria', [categoriaControler::class, 'create'])->name('formularioCategoria');

//metodos para enviar


Route::post('/recuperacion', [controladorVistas::class, 'rc'])->name('recuperacion');

Route::post('/iniciar', [controladorVistas::class, 'iniciar'])->name('in');

Route::post('/signin', [controladorVistas::class, 'signin'])->name('signin');



Route::post('/addproveedor', [proveedoresControler::class, 'store'])->name('addProveedor');

Route::post('/modidifcarProveedorPublicar', [controladorVistas::class, 'modProveedorPost'])->name('modProveedorPost');

Route::post('/addEmpleado', [empleadosControler::class, 'store'])->name('addEmpleado');

Route::post('/addCategoria', [categoriaControler::class,'store'])->name('agregarCategoria');


#metodos para realizar actualizaciones y eliminaciones 

#categorias

Route::get('/verModificarCategoria/{id}/edit', [categoriaControler::class,'edit'])->name('verModificarCategorias');
Route::put('/categoria/{id}', [categoriaControler::class, 'update'])->name('actualizarCategoria');
#metodos para eliminar
Route::delete('/eliminarCategoria/{id}', [categoriaControler::class, 'destroy'])->name('rutaEliminarCategoria');


#empleados
Route::get('/verModificarEmpleado/{id}/edit', [empleadosControler::class,'edit'])->name('verModEmpleado');
Route::put('/empleados/{id}', [empleadosControler::class, 'update'])->name('actualizarEmpleado');
Route::delete('/eliminarEmpleado/{id}', [empleadosControler::class, 'destroy'])->name('rutaEliminarEmpleado');

#proveedor
Route::get('/verModificarProveedor/{id}/edit', [proveedoresControler::class,'edit'])->name('modProveedor');
Route::put('/proveedores/{id}', [proveedoresControler::class, 'update'])->name('actualizarProveedor');
#delete
Route::delete('/eliminarProveedor/{id}', [proveedoresControler::class, 'destroy'])->name('rutaEliminarProveedor');

