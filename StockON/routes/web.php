<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controladorVistas;


Route::get('/',[controladorVistas::class, 'iniciarS'])->name('iniciar');

Route::get('/registro',[controladorVistas::class, 'registrarse'])->name('registro');

Route::get('/menu',[controladorVistas::class, 'menu'])->name('menu');

Route::get('/inventario',[controladorVistas::class, 'tabla'])->name('tabla');

Route::get('/agregarMaterial',[controladorVistas::class, 'agregarMaterial'])->name('agregarMaterial');

Route::get('/proveedores', [controladorVistas::class, 'proveedores'])->name('proveedores');

Route::get('/agregarProveedor', [controladorVistas::class, 'agregarProveedor'])->name('agregarProveedor');

Route::get('/recuperar', [controladorVistas::class, 'recuperar'])->name('recuperar');

Route::get('/modificarProveedor',[controladorVistas::class, 'modProveedor'])->name('modProveedor');

Route::get('/empleados', [controladorVistas::class,'verEmpleados'])->name('empleados');

route::get('/formularioEmpleados', [controladorVistas::class, 'formularioEmpleado'])->name('agregarEmpleado');

route::get('/categorias', [controladorVistas::class,'verCategorias'])->name('categorias');

Route::get('/formularioCategoria', [controladorVistas::class, 'verFormularioCategorias'])->name('formularioCategoria');

Route::get('/modificarCategoria', [controladorVistas::class, 'verModCategoria'])->name('verModCategoria');

Route::get('/verModificarEmpleado', [controladorVistas::class, 'verModificarEmpleado'])->name('verModificarEmpleado');

Route::get('/verModMateriales', [controladorVistas::class, 'verModMateriales'])->name('verModMateriales');

//metodos para enviar


Route::post('/recuperacion', [controladorVistas::class, 'rc'])->name('recuperacion');

Route::post('/iniciar', [controladorVistas::class, 'iniciar'])->name('in');

Route::post('/signin', [controladorVistas::class, 'signin'])->name('signin');

Route::post('/addmaterial', [controladorVistas::class, 'addmaterial'])->name('addmaterial');

Route::post('/addproveedor', [controladorVistas::class, 'addProveedor'])->name('addProveedor');

Route::post('/modidifcarProveedorPublicar', [controladorVistas::class, 'modProveedorPost'])->name('modProveedorPost');

Route::post('/addEmpleado', [controladorVistas::class, 'agregarEmpleado'])->name('addEmpleado');

Route::post('/addCategoria', [controladorVistas::class,'agregarCategoria'])->name('agregarCategoria');

Route::post('/modificarCategoria', [controladorVistas::class, 'modificarCategoria'])->name('modificarCategoria');

Route::post('/modificarEmpleado', [controladorVistas::class, 'modificarEmpleado'])->name('modificarEmpleado');

Route::post('/modificarMaterial', [controladorVistas::class, 'modMaterial'])->name('modMaterial');