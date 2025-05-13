@extends('layout.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <a href="{{url()->previous()}}" class="btn btn-secondary mb-3" style="background-color: #0b9440; color: white;">Volver</a>
        <div class="card-header bg-success text-white">
            <h3 class="mb-0">Editar Receta</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('recipes.update', $recipe) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="name_recipe" class="form-label">Nombre de la Receta:</label>
                    <input type="text" name="name_recipe" id="name_recipe" class="form-control" value="{{ $recipe->name_recipe }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="description" class="form-label">Descripción:</label>
                    <textarea name="description" id="description" class="form-control" rows="4" required>{{ $recipe->description }}</textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="ingredients" class="form-label">Ingredientes:</label>
                    <textarea name="ingredients" id="ingredients" class="form-control" rows="4" required>{{ $recipe->ingredients }}</textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="instructions" class="form-label">Instrucciones:</label>
                    <textarea name="instructions" id="instructions" class="form-control" rows="4" required>{{ $recipe->instructions }}</textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="preparation_time" class="form-label">Tiempo de Preparación:</label>
                    <input type="text" name="preparation_time" id="preparation_time" class="form-control" value="{{ $recipe->preparation_time }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="plant_id" class="form-label">Planta Relacionada:</label>
                    <select name="plant_id" id="plant_id" class="form-control" required>
                        @foreach ($plants as $plant)
                            <option value="{{ $plant->id }}" {{ $recipe->plant_id == $plant->id ? 'selected' : '' }}>
                                {{ $plant->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('recipes.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-success">Actualizar Receta</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection