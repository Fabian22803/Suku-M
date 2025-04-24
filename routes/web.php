<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;

Route::get('/', function () {
    return view('home');
});

Route::get('/home', [InicioController::class, 'create'])->name('home');

 




Route::get('/register', [RegistreController::class, 'create'])->name('register.create');
Route::post('/register',[RegistreController::class,'store'])->name('register.store');


// Route::get('/register', [RegistreController::class, 'create'])->name('Login.create');
Route::get('/login', function () {
    return view('Login'); // Asegúrate de que 'Login.blade.php' exista en resources/views
})->name('login.create');
