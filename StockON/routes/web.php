<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controladorVistas;
use App\Http\Controllers\materialesControler;
use App\Http\Controllers\proveedoresControler;
use App\Http\Controllers\empleadosControler;
use App\Http\Controllers\categoriaControler;


Route::get('/',[controladorVistas::class, 'iniciarS'])->name('iniciar');

Route::get('/registro',[controladorVistas::class, 'registrarse'])->name('registro');

Route::get('/menu',[controladorVistas::class, 'menu'])->name('menu');

#menu del inventario
Route::get('/inventario',[materialesControler::class, 'index'])->name('tabla');

#vista para agregar material
Route::get('/agregarMaterial',[materialesControler::class, 'create'])->name('agregarMaterial');

#vista para ver la lista de los proveedores
Route::get('/proveedores', [proveedoresControler::class, 'index'])->name('proveedores');

#vista para agregar proveedor
Route::get('/agregarProveedor', [proveedoresControler::class, 'create'])->name('agregarProveedor');


Route::get('/recuperar', [controladorVistas::class, 'recuperar'])->name('recuperar');

Route::get('/modificarProveedor',[controladorVistas::class, 'modProveedor'])->name('modProveedor');

#vista de la tabla de empleados
Route::get('/empleados', [empleadosControler::class,'index'])->name('empleados');

#Vista del formulario para agregar un empleado

route::get('/formularioEmpleados', [empleadosControler::class, 'create'])->name('agregarEmpleado');

route::get('/categorias', [categoriaControler::class,'index'])->name('categorias');

Route::get('/formularioCategoria', [categoriaControler::class, 'create'])->name('formularioCategoria');

Route::get('/modificarCategoria', [controladorVistas::class, 'verModCategoria'])->name('verModCategoria');

Route::get('/verModificarEmpleado', [controladorVistas::class, 'verModificarEmpleado'])->name('verModificarEmpleado');

Route::get('/verModMateriales', [controladorVistas::class, 'verModMateriales'])->name('verModMateriales');

//metodos para enviar


Route::post('/recuperacion', [controladorVistas::class, 'rc'])->name('recuperacion');

Route::post('/iniciar', [controladorVistas::class, 'iniciar'])->name('in');

Route::post('/signin', [controladorVistas::class, 'signin'])->name('signin');

Route::post('/addmaterial', [materialesControler::class, 'store'])->name('addmaterial');

Route::post('/addproveedor', [proveedoresControler::class, 'store'])->name('addProveedor');

Route::post('/modidifcarProveedorPublicar', [controladorVistas::class, 'modProveedorPost'])->name('modProveedorPost');

Route::post('/addEmpleado', [empleadosControler::class, 'store'])->name('addEmpleado');

Route::post('/addCategoria', [categoriaControler::class,'store'])->name('agregarCategoria');

Route::post('/modificarCategoria', [controladorVistas::class, 'modificarCategoria'])->name('modificarCategoria');

Route::post('/modificarEmpleado', [controladorVistas::class, 'modificarEmpleado'])->name('modificarEmpleado');

Route::post('/modificarMaterial', [controladorVistas::class, 'modMaterial'])->name('modMaterial');