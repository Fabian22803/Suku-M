<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

use App\Http\Controllers\InicioController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/inicio', function () {
    return view('login');
})->name('inicio');

//regitro de usuario
// Ruta para mostrar el formulario de registro
Route::get('/register', [UserController::class, 'ShowRegisterForm'])->name('register.form');
// Ruta para procesar el registro
Route::post('/register', [UserController::class, 'store'])->name('register');
//login de usuario
// Ruta para mostrar el formulario de inicio de sesión
Route::get('/login', [UserController::class, 'create'])->name('login.form');

// Ruta para procesar el inicio de sesión
Route::post('/login', [UserController::class, 'login'])->name('login');

// Ruta para cerrar sesión
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
// Rutas para lo de planta
Route::middleware('auth')->group(function () {
    Route::get('/plants', [PlantController::class, 'index'])->name('plants.index');//mostrar todas las plantas
    Route::get('/plants/create', [PlantController::class, 'create'])->name('plants.create');//formulario para crear una planta
    Route::post('/plants', [PlantController::class, 'store'])->name('plants.store');//guardar la planta
    Route::get('/plants/{plant}/edit', [PlantController::class, 'edit'])->name('plant.edit');//formulario para editar una planta
    Route::put('/plants/{plant}', [PlantController::class, 'update'])->name('plants.update');//actualizar la planta
    Route::delete('/plants/{plant}', [PlantController::class, 'destroy'])->name('plants.destroy');// eliminar la planta
});

// Rutas para recetas
Route::middleware('auth')->group(function () {
    Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes.index');
    Route::get('/recipes/create', [RecipeController::class, 'create'])->name('recipes.create');
    Route::post('/recipes', [RecipeController::class, 'store'])->name('recipes.store');
    Route::get('/recipes/{recipe}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
    Route::put('/recipes/{recipe}', [RecipeController::class, 'update'])->name('recipes.update');
    Route::delete('/recipes/{recipe}', [RecipeController::class, 'destroy'])->name('recipes.destroy');
});
