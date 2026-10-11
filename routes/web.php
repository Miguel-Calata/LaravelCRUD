<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotaController;

/* // Rutas para el controlador HomeController
Route::redirect('/', '/notas');

// Rutas para el controlador NotaController
Route::get('/notas', [NotaController::class, 'index']) -> name('notas.index');

Route::post('/notas', [NotaController::class, 'store']) -> name('notas.store');

Route::get('/notas/create', [NotaController::class, 'create']) -> name ('notas.create');
Route::get('/notas/{nota}', [NotaController::class, 'show']) -> name('notas.show');
Route::get('/notas/{nota}/edit', [NotaController::class, 'edit']) -> name('notas.edit'); // es get porque es para mostrar el formulario de edición
Route::put('/notas/{nota}', [NotaController::class, 'update']) -> name('notas.update'); // put porque es para actualizar la nota
Route::delete('/notas/{nota}', [NotaController::class, 'destroy'])->name('notas.destroy'); */


Route::redirect('/', '/notas');

Route::prefix('notas')
    ->name('notas.')
    ->controller(NotaController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/papelera', 'papelera')->name('papelera');
        Route::patch('/{nota}/restaurar', 'restaurar')->name('restaurar') -> withTrashed();
        Route::get('/{nota}', 'show')->name('show');
        Route::get('/{nota}/edit', 'edit')->name('edit');
        Route::put('/{nota}', 'update')->name('update');
        Route::delete('/{nota}', 'destroy')->name('destroy');
        Route::patch('/{nota}/fijar', 'fijar')->name('fijar');
        
    });

Route::get('/welcome', function () {
    return view('welcome');
});
