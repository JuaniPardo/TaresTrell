<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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
