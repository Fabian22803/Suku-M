@extends('layout.app')

@section('content')
<div class="container mt-5">
    <a href="{{url()->previous()}}" class="btn btn-secondary mb-3" style="background-color: #0b9440; color: white;">Volver</a>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="text-success">Lista de Plantas</h1>
        @if (Auth::check())
        <a href="{{ route('plants.create') }}" class="btn btn-success">Agregar Planta</a>
        @endif
    </div>

    
    <!-- Formulario de búsqueda -->
    <form action="{{ route('plants.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Buscar planta por nombre..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-success">Buscar</button>
        </div>
    </form> 

    <div class="row">
        @forelse ($plants as $plant)
            <div class="col-md-4">
                <div class="card mb-3 shadow">
                    @if ($plant->image)
                        <img src="{{ asset('storage/' . $plant->image) }}" class="card-img-top" alt="{{ $plant->name }}" style="max-height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title text-success">{{ $plant->name }}</h5>
                        <p class="card-text"><strong>Nombre científico:</strong> {{ $plant->scientific_name }}</p>
                        
                        <p class="card-text"><strong>Descripción:</strong> {{ $plant->description}}</p>
                        <p class="card-text"><strong>Beneficios:</strong> {{ $plant->benefits }}</p>
                        @if ($plant->users_id === Auth::id())
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('plant.edit', $plant) }}" class="btn btn-primary btn-sm">Editar</a>
                                <form action="{{ route('plants.destroy', $plant) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
             @empty
            <p class="text-center">No se encontraron plantas.</p>
        @endforelse  
    </div>
</div>
@endsection