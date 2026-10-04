<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotaController;

// Rutas para el controlador HomeController
Route::get('/', [HomeController::class, 'index']);

// Rutas para el controlador NotaController
route::get('/notas', [NotaController::class, 'index']);
route::get('/notas/create', [NotaController::class, 'create']);
route::get('/notas/{nota}', [NotaController::class, 'show']);
