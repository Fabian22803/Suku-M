
@extends('layout.app')

@section('content')
<div class="container mt-5">
    
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-success text-white text-center">
                    <h3>Iniciar Sesión</h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Correo Electrónico:</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Ingresa tu correo" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password" class="form-label">Contraseña:</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Ingresa tu contraseña" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Iniciar Sesión</button>
                        </div>
                    <div class="d-grid mt-3">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary" style="background-color: #0b9440; color: white;">Volver</a>
                    </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <small>¿No tienes una cuenta? <a href="{{ route('register.form') }}" class="text-success">Regístrate aquí</a></small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection