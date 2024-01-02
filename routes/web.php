<?php

use App\Http\Controllers\DocenteController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\EstudianteController;
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

Route::post('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::view('/docentes' , '/vistas.docentes');
Route::view('/perfil' , '/vistas.perfil');

//Rutas de Docentes
Route::get('/docentes', [DocenteController::class, 'index'])->name('docentes.index');
Route::post('/registro-docente', [DocenteController::class, 'create'])->name('docentes.create');
Route::post('/editar-docente{id}', [DocenteController::class, 'update'])->name('docentes.update');
Route::get('/eliminar-docente{id}', [DocenteController::class, 'destroy'])->name('docentes.destroy');
Route::get('/buscar-docente', [DocenteController::class, 'buscar'])->name('docentes.buscar');


//Rutas de Estudiantes
Route::get('/estudiantes', [EstudianteController::class, 'index'])->name('estudiantes.index');
Route::post('/registro-estudiante', [EstudianteController::class, 'create'])->name('estudiantes.create');
Route::post('/editar-estudiante{id}', [EstudianteController::class, 'update'])->name('estudiantes.update');
Route::get('/eliminar-estudiante{id}', [EstudianteController::class, 'destroy'])->name('estudiantes.destroy');
Route::get('/buscar-estudiante', [EstudianteController::class, 'buscar'])->name('estudiantes.buscar');

Route::post('/nueva-materia', [MateriaController::class, 'create'])->name('materia.create');