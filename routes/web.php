<?php

use App\Http\Controllers\API\IncidencesController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IncidenciasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\SucursalesController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('login');

//login
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

//logout
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

//Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

//Incidencias
Route::get('/incidencias', [IncidenciasController::class, 'index'])->name('incidencias.index')->middleware('auth');
Route::get('/incidencias/create', [IncidenciasController::class, 'create'])->name('incidencias.create')->middleware('auth');
Route::post('/incidencias', [IncidenciasController::class, 'store'])->name('incidencias.store')->middleware('auth');
Route::get('/incidencias/{incidencia}', [IncidenciasController::class, 'show'])->name('incidencias.show')->middleware('auth');


//Categorias
Route::get('/categorias', [CategoriasController::class, 'index'])->name('categorias.index')->middleware('auth');
Route::get('/categorias/create', [CategoriasController::class, 'create'])->name('categorias.create')->middleware('auth');
Route::post('/categorias', [CategoriasController::class, 'store'])->name('categorias.store')->middleware('auth');
Route::get('/categorias/{category}/edit', [CategoriasController::class, 'edit'])->name('categorias.edit')->middleware('auth');
Route::put('/categorias/{category}', [CategoriasController::class, 'update'])->name('categorias.update')->middleware('auth');
Route::delete('/categorias/{category}', [CategoriasController::class, 'destroy'])->name('categorias.destroy')->middleware('auth');


//sucursales
Route::get('/sucursales', [SucursalesController::class, 'index'])->name('sucursales.index')->middleware('auth');
Route::get('/sucursales/create', [SucursalesController::class, 'create'])->name('sucursales.create')->middleware('auth');
Route::post('/sucursales', [SucursalesController::class, 'store'])->name('sucursales.store')->middleware('auth');
Route::get('/sucursales/{sucursal}/edit', [SucursalesController::class, 'edit'])->name('sucursales.edit')->middleware('auth');
Route::put('/sucursales/{sucursal}', [SucursalesController::class, 'update'])->name('sucursales.update')->middleware('auth');

Route::delete('/sucursales/{sucursal}', [SucursalesController::class, 'destroy'])->name('sucursales.destroy')->middleware('auth');

//Usuarios
Route::get('/usuarios', [UsuariosController::class, 'index'])->name('usuarios.index')->middleware('auth')->middleware('role:administrador');
Route::get('/usuarios/create', [UsuariosController::class, 'create'])->name('usuarios.create')->middleware('auth');
Route::post('/usuarios', [UsuariosController::class, 'store'])->name('usuarios.store');
Route::get('/usuarios/{usuario}/edit', [UsuariosController::class, 'edit'])->name('usuarios.edit')->middleware('auth');
Route::put('/usuarios/{usuario}', [UsuariosController::class, 'update'])->name('usuarios.update')->middleware('auth');
Route::delete('/usuarios/{usuario}', [UsuariosController::class, 'destroy'])->name('usuarios.destroy')->middleware('auth');



//Registro Usuarios
Route::get('/registro/create', [RegistroController::class, 'create'])->name('registro.create');
Route::post('/registro', [RegistroController::class, 'store'])->name('registro.store');


//API
Route::get('/users', [UserController::class, 'index']);

//asignar usuario
Route::post('/users/create', [UserController::class, 'store'])->name('user.store');

//obtener incidencias
Route::get('/incidences', [IncidencesController::class, 'index']);


