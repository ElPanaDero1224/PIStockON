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