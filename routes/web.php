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

Route::controller(UserController::class)->group(function () {
    Route::get('/register', 'ShowRegisterForm')->name('register.form');
    Route::post('/register', 'store')->name('register');
    Route::get('/login', 'create')->name('login.form');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout');
    

});
Route::controller(PlantController::class)->group(function () {
    Route::get('/plants', 'index')->name('plants.index'); // muestra todas las plantas es público
    Route::middleware('auth')->group(function () {
        Route::get('/plants/create', 'create')->name('plants.create'); // Formulario para crear una planta
        Route::post('/plants', 'store')->name('plants.store'); // Guardar la planta
        Route::get('/plants/{plant}/edit', 'edit')->name('plant.edit'); // Formulario para editar una planta
        Route::put('/plants/{plant}', 'update')->name('plants.update'); // Actualizar la planta
        Route::delete('/plants/{plant}', 'destroy')->name('plants.destroy'); // Eliminar la planta
    });
});
Route::controller(RecipeController::class)->group(function () {
    Route::get('/recipes', 'index')->name('recipes.index'); // Mostrar todas las recetas público
    Route::middleware('auth')->group(function () {
        Route::get('/recipes/create', 'create')->name('recipes.create'); // Formulario para crear una receta
        Route::post('/recipes', 'store')->name('recipes.store'); // Guardar la receta
        Route::get('/recipes/{recipe}/edit', 'edit')->name('recipes.edit'); // Formulario para editar una receta
        Route::put('/recipes/{recipe}', 'update')->name('recipes.update'); // Actualizar la receta
        Route::delete('/recipes/{recipe}', 'destroy')->name('recipes.destroy'); // Eliminar la receta
    });
});
