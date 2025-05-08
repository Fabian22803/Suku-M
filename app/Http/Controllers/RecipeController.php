<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Plant;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    public function index(Request $request)
    {
        // Obtener todas las recetas de la base de datos
        $query = Recipe::with('plant', 'user');
        
        // Filtrar por nombre de receta
        if ($request->has('search') && $request->search) {
            $query ->where('name_recipe', 'like', '%' . $request->search . '%');
        }
        //las recetas filtradas
        $recipes = $query->get();
        // Pasar las recetas a la vista
        return view('recipes.index', compact('recipes'));
    }

    public function create()
    {
        // Mostrar el formulario para crear una nueva receta
        $plants = Plant::all(); // Obtener todas las plantas para el formulario
        return view('recipes.create', compact('plants'));
    }

    public function store(Request $request)
    {
        // Validate and store the new recipe
        $request->validate([
            'name_recipe' => 'required|string|max:255',
            'description' => 'required|string',
            'ingredients' => 'required|string',
            'instructions' => 'required|string',
            'preparation_time' => 'required|string',
            'plant_id' => 'required|exists:plants,id',
            'plant_id' => 'required|exists:plants,id',
        ]);

        Recipe::create([
            'name_recipe' => $request->input('name_recipe'),
            'description' => $request->input('description'),
            'ingredients' => $request->input('ingredients'),
            'instructions' => $request->input('instructions'),
            'preparation_time' => $request->input('preparation_time'),
            'plant_id' => $request->input('plant_id'),
            'user_id' => Auth::id(), // Asignar el ID del usuario autenticado
        ]);

        return redirect()->route('recipes.index')->with('success', 'Recipe created successfully.');
    }
    public function edit(Recipe $recipe)
    {
        if ($recipe->user_id !== Auth::id()) {
            return redirect()->route('recipes.index')->with('error', 'You do not have permission to edit this recipe.');
        }
        $plants = Plant::all(); // Obtener todas las plantas para el formulario
        return view('recipes.edit', compact('recipe', 'plants'));
    }
    public function update(Request $request, Recipe $recipe)
    {
        if ($recipe->user_id !== Auth::id()) {
            return redirect()->route('recipes.index')->with('error', 'You do not have permission to edit this recipe.');
        }

        // Validate and update the recipe
        $request->validate([
            'name_recipe' => 'required|string|max:255',
            'description' => 'required|string',
            'ingredients' => 'required|string',
            'instructions' => 'required|string',
            'preparation_time' => 'required|string',
            'plant_id' => 'required|exists:plants,id',
        ]);

        $recipe->update($request->all());

        return redirect()->route('recipes.index')->with('success', 'Recipe updated successfully.');
    }
    public function destroy(Recipe $recipe)
    {
        if ($recipe->user_id !== Auth::id()) {
            return redirect()->route('recipes.index')->with('error', 'You do not have permission to delete this recipe.');
        }

        $recipe->delete();

        return redirect()->route('recipes.index')->with('success', 'Recipe deleted successfully.');
    }
}
