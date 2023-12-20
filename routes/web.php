<?php

use App\Http\Controllers\DocenteController;
use App\Http\Controllers\MateriaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('/auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::view('/docentes' , '/vistas.docentes');

//Rutas de Docentes
Route::get('/docentes', [DocenteController::class, 'index'])->name('docentes.index');
Route::post('/registro-docente', [DocenteController::class, 'create'])->name('docentes.create');
Route::post('/editar-docente{id}', [DocenteController::class, 'update'])->name('docentes.update');
Route::get('/eliminar-docente{id}', [DocenteController::class, 'destroy'])->name('docentes.destroy');
Route::get('/buscar-docente', [DocenteController::class, 'buscar'])->name('docentes.buscar');

Route::post('/nueva-materia', [MateriaController::class, 'create'])->name('materia.create');