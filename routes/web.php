<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IngredienteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavoritoController;

Route::get('/', function () {
    return redirect()->route('acceso'); 
});

Route::get('/registro', [
    AuthController::class, 'registerForm'
])->name('registro');

Route::post('/registro', [
    AuthController::class, 'register'
])->name('registro.store');

Route::get('/acceso', [
    AuthController::class, 'loginForm'
])->name('acceso');

Route::post('/acceso', [
    AuthController::class, 'login'
])->name('acceso.store');

Route::middleware(['auth'])->group(function () {
    
    Route::get('/home', [
        IngredienteController::class, 'home'
    ])->name('home');

    Route::get('/explorar', [
        IngredienteController::class, 'explorar'
    ])->name('explorar');

    Route::post('/cerrar', [
        AuthController::class, 'logout' 
    ])->name('cerrar');

    Route::resource('ingredientes', IngredienteController::class);

    Route::get('/mis-favoritos', [
        FavoritoController::class, 'index'
    ])->name('favoritos.index');

    Route::post('/mis-favoritos', [
        FavoritoController::class, 'store'
    ])->name('favoritos.store');

    Route::put('/mis-favoritos/{favorito}', [
        FavoritoController::class, 'update'
    ])->name('favoritos.update');

    Route::delete('/mis-favoritos/{favorito}', [
        FavoritoController::class, 'destroy'
    ])->name('favoritos.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    
    Route::get('/admin-dashboard', [
        AuthController::class, 'adminDashboard'
    ])->name('admin-dashboard');
    
    Route::get('/usuarios/{usuario}/edit', [
        AuthController::class, 'editUsuario'
    ])->name('usuarios.edit');

    Route::put('/usuarios/{usuario}', [
        AuthController::class, 'updateUsuario'
    ])->name('usuarios.update');

    Route::delete('/usuarios/{usuario}', [
        AuthController::class, 'destroyUsuario'
    ])->name('usuarios.destroy');
});