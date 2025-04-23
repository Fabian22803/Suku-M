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

