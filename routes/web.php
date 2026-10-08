<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotaController;

// Rutas para el controlador HomeController
Route::get('/', HomeController::class);

// Rutas para el controlador NotaController
Route::get('/notas', [NotaController::class, 'index']) -> name('notas.index');

Route::post('/notas', [NotaController::class, 'store']) -> name('notas.store');


Route::get('/notas/{nota}', [NotaController::class, 'show']) -> name('notas.show');
Route::get('/notas/{nota}/edit', [NotaController::class, 'edit']) -> name('notas.edit');
Route::put('/notas/{nota}', [NotaController::class, 'update']) -> name('notas.update');



Route::get('/notas/create', [NotaController::class, 'create']) -> name ('notas.create');