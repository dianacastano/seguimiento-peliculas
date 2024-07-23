<?php

use App\Http\Controllers\PeliculaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PeliculaController::class, 'index'])->name('peliculas.index');
Route::get('/crear', [PeliculaController::class, 'create'])->name('peliculas.create');
Route::post('/guardar', [PeliculaController::class, 'store'])->name('peliculas.store');
Route::post('/completar/{index}', [PeliculaController::class, 'complete'])->name('peliculas.complete');
Route::delete('/eliminar/{index}', [PeliculaController::class, 'destroy'])->name('peliculas.destroy');
