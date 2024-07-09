<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PersonsController;

# Ruta de Login.
Route::get('/', [AuthController::class, 'getViewLogin'])->name('login')->middleware('guest');
Route::post('/auth', [AuthController::class, 'authLogin']);

# Ruta de Registro.
Route::get('/registro', [AuthController::class, 'getViewRegister'])->middleware('guest');
Route::post('/register', [AuthController::class, 'registerApplication']);


Route::get('/logout', [AuthController::class, 'authLogout']);


Route::middleware('auth')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'getViewDashboard']);
    Route::get('/dashboard/personas', [PersonsController::class, 'getViewPersons']);
});