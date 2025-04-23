<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;

Route::get('/', function () {
    return view('home');
});

Route::get('/home', [InicioController::class, 'create'])->name('home');

 