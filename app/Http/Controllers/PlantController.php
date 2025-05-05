<?php

namespace App\Http\Controllers;
use App\Models\Plant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PlantController extends Controller
{
    public function index()
    {
        // Aquí puedes obtener las plantas de la base de datos y pasarlas a la vista
        $plants = Plant::all();
        return view('plant', compact('plants'));
    }
    public function create()
    {
        // Aquí puedes mostrar el formulario para crear una nueva planta
        return view('create_plant');
    }
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'scientific_name' => 'required|string|max:255',
            'description' => 'required|string',
            'benefits' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_plants_id' => 'required|integer|exists:category_plants,id',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }
        // Crear una nueva planta
        Plant::create([
            'name' => $request->input('name'),
            'scientific_name' => $request->input('scientific_name'),
            'description' => $request->input('description'),
            'benefits' => $request->input('benefits'),
            'image' => $imagePath,
            'category_plants_id' => $request->input('category_plants_id'),
            'users_id' => Auth::id(), // Asignar el ID del usuario autenticado
        ]);
        return redirect()->route('plants.index')->with('success', 'Planta creada con éxito.');
}
    public function edit(Plant $plant)
    {
        // Aquí puedes mostrar el formulario para editar una planta existente
        return view('plants.edit', compact('plant'));
    }
    public function update(Request $request, Plant $plant)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'scientific_name' => 'required|string|max:255',
            'description' => 'required|string',
            'benefits' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_plants_id' => 'required|integer|exists:category_plants,id',
        ]);
        // decidir si va 
        $imagePath = $plant->image;
        if ($request->hasFile('image')) {
            // Eliminar la imagen anterior si existe
            if ($plant->image) {
                Storage::disk('public')->delete($plant->image);
            }
            $imagePath = $request->file('image')->store('images', 'public');
        }

        // Actualizar la planta
        $plant->update([
            'name' => $request->input('name'),
            'scientific_name' => $request->input('scientific_name'),
            'description' => $request->input('description'),
            'benefits' => $request->input('benefits'),
            'image' => $imagePath,
            'category_plants_id' => $request->input('category_plants_id'),
        ]);

        return redirect()->route('plants.index')->with('success', 'Planta actualizada con éxito.');
    }
    public function destroy(Plant $plant)
    {
        // Eliminar la planta
        $plant->delete();
        return redirect()->route('plants.index')->with('success', 'Planta eliminada con éxito.');
    }

}