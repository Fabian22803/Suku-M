@extends('layout.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <h3 class="mb-0">Agregar Nueva Planta</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('plants.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="name" class="form-label">Nombre:</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Ingresa el nombre de la planta" required>
                </div>
                <div class="form-group mb-3">
                    <label for="scientific_name" class="form-label">Nombre Científico (opcional):</label>
                    <input type="text" name="scientific_name" id="scientific_name" class="form-control" placeholder="Ingresa el nombre científico">
                </div>
                <div class="form-group mb-3">
                    <label for="description" class="form-label">Descripción:</label>
                    <textarea name="description" id="description" class="form-control" rows="4" placeholder="Describe la planta" required></textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="benefits" class="form-label">Beneficios:</label>
                    <textarea name="benefits" id="benefits" class="form-control" rows="4" placeholder="Describe los beneficios de la planta" required></textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="image" class="form-label">Imagen:</label>
                    <input type="file" name="image" id="image" class="form-control" accept="image/*">
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('plants.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-success">Guardar Planta</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection