@extends('layout.app')

@section('content')
<div class="container mt-5">
    <a href="{{url()->previous()}}" class="btn btn-secondary mb-3" style="background-color: #0b9440; color: white;">Volver</a>
    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <h3 class="mb-0">Editar Planta</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('plants.update', $plant) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="name" class="form-label">Nombre:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $plant->name }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="scientific_name" class="form-label">Nombre Científico (opcional):</label>
                    <input type="text" name="scientific_name" id="scientific_name" class="form-control" value="{{ $plant->scientific_name }}">
                </div>
                <div class="form-group mb-3">
                    <label for="description" class="form-label">Descripción:</label>
                    <textarea name="description" id="description" class="form-control" rows="4" required>{{ $plant->description }}</textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="benefits" class="form-label">Beneficios:</label>
                    <textarea name="benefits" id="benefits" class="form-control" rows="4" required>{{ $plant->benefits }}</textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="image" class="form-label">Imagen:</label>
                    @if ($plant->image)
                        <img src="{{ asset('storage/' . $plant->image) }}" alt="{{ $plant->name }}" class="img-thumbnail mb-2" style="max-width: 200px;">
                    @endif
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('plants.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-success">Actualizar Planta</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection