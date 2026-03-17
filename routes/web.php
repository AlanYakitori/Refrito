<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IngredienteController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('ingredientes', IngredienteController::class);
});


//Ruta para consultar
route::get('/ingredientes/{id}/edit',[
    IngredienteController::class, 'edit'
])->name('ingredientes.edit');


//Ruta para actualizar
Route::put('/ingredientes/{id}',[
    IngredienteController::class, 'update'
])->name('ingredientes.update');


//Ruta para mostrar el formulario de registro
Route::get('/registro', [
    AuthController::class, 'registerForm'
])->name('registro');

//Ruta para manejar el registro del usuario
Route::post('/registro', [
    AuthController::class, 'register'
])->name('registro.store');

//Ruta para mostrar el formulario de inicio de sesion
Route::get('/acceso', [
    AuthController::class, 'loginForm'
])->name('acceso');

//Ruta para verificar el inicio de sesion
Route::post('/acceso', [
    AuthController::class, 'login'
])->name('acceso.store');

//Ruta para cerrar sesion
Route::post('/cerrar', [
    AuthController::class, 'logout' 
])->name('cerrar');

Route::middleware(['admin'])->group(function () {
    Route::get('/admin-dashboard',[
        AuthController::class, 'adminDashboard'
    ])->name('admin-dashboard');
});

