<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotaController;

// Rutas para el controlador HomeController
Route::get('/', HomeController::class);

// Rutas para el controlador NotaController
Route::get('/notas', [NotaController::class, 'index']) -> name('notas.index');
Route::get('/notas/create', [NotaController::class, 'create']) -> name ('notas.create');
Route::get('/notas/{nota}', [NotaController::class, 'show']) -> name('notas.show');
Route::post('/notas', [NotaController::class, 'store']) -> name('notas.store');