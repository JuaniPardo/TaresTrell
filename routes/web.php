<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Route::resource(
    'tareas',
    App\Http\Controllers\TareaController::class
)->middleware('auth');
Route::put('/tareas/{tarea}/avanzar', [TareaController::class, 'avanzar'])->name('tareas.avanzar');
Route::put('/tareas/{tarea}/retroceder', [TareaController::class, 'retroceder'])->name('tareas.retroceder');

Route::resource(
    'listas',
    App\Http\Controllers\ListaController::class
)->middleware('auth');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
