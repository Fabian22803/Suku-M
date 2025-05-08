@extends('layout.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="text-success">Lista de Recetas</h1>
        <a href="{{ route('recipes.create') }}" class="btn btn-success">Agregar Receta</a>
    </div>
    {{-- formulario de busqueda --}}
    <form action="{{ route('recipes.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Buscar receta por nombre..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-success">Buscar</button>
        </div>
    </form>
    @if ($recipes->isEmpty())
        <p class="text-center">No hay recetas disponibles.</p>
    @else
        <div class="row">
            @foreach ($recipes as $recipe)
                <div class="col-md-4">
                    <div class="card mb-3 shadow">
                        <div class="card-body">
                            <h5 class="card-title text-success">{{ $recipe->name_recipe }}</h5>
                            <p class="card-text"><strong>Planta relacionada:</strong> {{ $recipe->plant->name }}</p>
                            <p class="card-text"><strong>Descripción:</strong> {{ Str::limit($recipe->description, 100) }}</p>
                            <p class="card-text"><strong>Tiempo de preparación:</strong> {{ $recipe->preparation_time }}</p>
                            @if ($recipe->user_id === Auth::id())
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('recipes.edit', $recipe) }}" class="btn btn-primary btn-sm">Editar</a>
                                    <form action="{{ route('recipes.destroy', $recipe) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection