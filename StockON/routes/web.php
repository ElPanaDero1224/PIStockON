<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controladorVistas;


Route::get('/',[controladorVistas::class, 'iniciarS'])->name('iniciar');

Route::get('/registro',[controladorVistas::class, 'registrarse'])->name('registro');

Route::get('/menu',[controladorVistas::class, 'menu'])->name('menu');