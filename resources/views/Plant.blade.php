@extends('layout.app')

@section('content')
<div class="container mt-5">
    <h1>Lista de Plantas</h1>
    <a href="{{ route('plants.create') }}" class="btn btn-success mb-3">Agregar Planta</a>
    <div class="row">
        @foreach ($plants as $plant)
            <div class="col-md-4">
                <div class="card mb-3">
                    @if ($plant->image)
                        <img src="{{ asset('storage/' . $plant->image) }}" class="card-img-top" alt="{{ $plant->name }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $plant->name }}</h5>
                        <p class="card-text">{{ $plant->description }}</p>
                        <a href="{{ route('plants.edit', $plant) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('plants.destroy', $plant) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection