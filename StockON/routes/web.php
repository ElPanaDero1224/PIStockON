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

Route::post('/recuperacion', [controladorVistas::class, 'rc'])->name('recuperacion');

Route::post('/iniciar', [controladorVistas::class, 'iniciar'])->name('in');

Route::post('/signin', [controladorVistas::class, 'signin'])->name('signin');

Route::post('/addmaterial', [controladorVistas::class, 'addmaterial'])->name('addmaterial');

Route::post('/addproveedor', [controladorVistas::class, 'addProveedor'])->name('addProveedor');