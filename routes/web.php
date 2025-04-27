<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;

Route::get('/', function () {
    return view('home');
});

Route::get('/home', [InicioController::class, 'create'])->name('home');

//para el registro del usuario
Route::get('/register', [RegistreController::class, 'create'])->name('register.create');
Route::post('/register',[RegistreController::class,'store'])->name('register.store');

//para el inicio de sesion

//para la recuperacion de contraseña
//muestra el formulario de recuperacion de contraseña
Route::get('/Recuperar_Contraseña', [PasswordRestController::class, 'showForgotPasswordForm'])->name('password.request');
//envia el enlace de restablecimiento de contraseña
Route::post('/password/email', [PasswordRestController::class, 'sendResetLink'])->name('password.email');

// Ruta para mostrar el formulario de restablecimiento de contraseña
Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->name('password.reset');