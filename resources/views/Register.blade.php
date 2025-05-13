@extends('layout.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header text-center bg-success text-white">
                    <h3>Registrarte</h3>
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
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre:</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Ingresa tu nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Apellido:</label>
                            <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Ingresa tu apellido" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico:</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Ingresa tu correo" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña:</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Ingresa tu contraseña" required>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirmar Contraseña:</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirma tu contraseña" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Teléfono:</label>
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Ingresa tu teléfono" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Dirección:</label>
                            <input type="text" name="address" id="address" class="form-control" placeholder="Ingresa tu dirección" required>
                        </div>
                       
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Registrarte</button>
                        </div>
                        <div class="d-grid mt-3">
                            <a href="{{ url()->previous() }}" class="btn btn-secondary" style="background-color: #0b9440; color: white;">Volver</a>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <small>¿Ya tienes una cuenta? <a href="{{ route('login.form') }}">Inicia sesión aquí</a></small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection