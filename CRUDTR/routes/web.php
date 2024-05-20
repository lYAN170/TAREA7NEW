<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\CursoController;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/about', function () {
    return view('about');
})->name('about');

/*Rutas para Persona*/
//Route::resource('personas', PersonaController::class);
Route::get('/personas', [PersonaController::class, 'index'])->name('personas.index');
Route::get('/personas/create', [PersonaController::class, 'create'])->name('personas.create');
Route::post('/personas', [PersonaController::class, 'store'])->name('personas.store');
Route::get('/personas/{persona}', [PersonaController::class, 'show'])->name('personas.show');
Route::get('/personas/{persona}/edit', [PersonaController::class, 'edit'])->name('personas.edit');
Route::put('/personas/{persona}', [PersonaController::class, 'update'])->name('personas.update');
Route::delete('/personas/{persona}', [PersonaController::class, 'destroy'])->name('personas.destroy');


// Rutas para Docente
Route::get('/docentes', [DocenteController::class, 'index'])->name('docentes.index');
Route::get('/docentes/create', [DocenteController::class, 'create'])->name('docentes.create');
Route::post('/docentes', [DocenteController::class, 'store'])->name('docentes.store');
Route::get('/docentes/{docente}', [DocenteController::class, 'show'])->name('docentes.show');
Route::get('/docentes/{docente}/edit', [DocenteController::class, 'edit'])->name('docentes.edit');
Route::put('/docentes/{docente}', [DocenteController::class, 'update'])->name('docentes.update');
Route::delete('/docentes/{docente}', [DocenteController::class, 'destroy'])->name('docentes.destroy');

// Rutas para Estudiantes
Route::get('/estudiantes', [EstudianteController::class, 'index'])->name('estudiantes.index');
Route::get('/estudiantes/create', [EstudianteController::class, 'create'])->name('estudiantes.create');
Route::post('/estudiantes', [EstudianteController::class, 'store'])->name('estudiantes.store');
Route::get('/estudiantes/{estudiante}', [EstudianteController::class, 'show'])->name('estudiantes.show');
Route::get('/estudiantes/{estudiante}/edit', [EstudianteController::class, 'edit'])->name('estudiantes.edit');
Route::put('/estudiantes/{estudiante}', [EstudianteController::class, 'update'])->name('estudiantes.update');
Route::delete('/estudiantes/{estudiante}', [EstudianteController::class, 'destroy'])->name('estudiantes.destroy');

// Rutas para Cursos
Route::get('/cursos', [CursoController::class, 'index'])->name('cursos.index');
Route::get('/cursos/create', [CursoController::class, 'create'])->name('cursos.create');
Route::post('/cursos', [CursoController::class, 'store'])->name('cursos.store');
Route::get('/cursos/{curso}', [CursoController::class, 'show'])->name('cursos.show');
Route::get('/cursos/{curso}/edit', [CursoController::class, 'edit'])->name('cursos.edit');
Route::put('/cursos/{curso}', [CursoController::class, 'update'])->name('cursos.update');
Route::delete('/cursos/{curso}', [CursoController::class, 'destroy'])->name('cursos.destroy');
