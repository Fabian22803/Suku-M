<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistreController;


Route::get('/register', [RegistreController::class, 'create'])->name('register.create');
Route::post('/register',[RegistreController::class,'store'])->name('register.store');
