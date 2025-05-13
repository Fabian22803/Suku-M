@extends('layout.app')

@section('content')
<div class="container mt-5">
   
    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <h3 class="mb-0">Agregar Nueva Receta</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('recipes.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="name_recipe" class="form-label">Nombre de la Receta:</label>
                    <input type="text" name="name_recipe" id="name_recipe" class="form-control" placeholder="Ingresa el nombre de la receta" required>
                </div>
                <div class="form-group mb-3">
                    <label for="description" class="form-label">Descripción:</label>
                    <textarea name="description" id="description" class="form-control" rows="4" placeholder="Describe la receta" required></textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="ingredients" class="form-label">Ingredientes:</label>
                    <textarea name="ingredients" id="ingredients" class="form-control" rows="4" placeholder="Lista los ingredientes" required></textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="instructions" class="form-label">Instrucciones:</label>
                    <textarea name="instructions" id="instructions" class="form-control" rows="4" placeholder="Escribe las instrucciones" required></textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="preparation_time" class="form-label">Tiempo de Preparación:</label>
                    <input type="text" name="preparation_time" id="preparation_time" class="form-control" placeholder="Ejemplo: 30 minutos" required>
                </div>
                <div class="form-group mb-3">
                    <label for="plant_id" class="form-label">Planta Relacionada:</label>
                    <select name="plant_id" id="plant_id" class="form-control" required>
                        <option value="" disabled selected>Selecciona una planta</option>
                        @foreach ($plants as $plant)
                            <option value="{{ $plant->id }}">{{ $plant->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('recipes.index') }}" class="btn btn-secondary" style="background-color: #0b9440; color: white;">Cancelar</a>
                    <button type="submit" class="btn btn-success">Guardar Receta</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection