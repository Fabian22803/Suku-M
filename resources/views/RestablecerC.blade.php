<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña</title>
</head>
<body>
    <h1>Restablecer Contraseña</h1>
    @if ($errors->any())
        <p style="color: red;">{{ $errors->first() }}</p>
    @endif
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <label for="email">Correo Electrónico:</label>
        <input type="email" name="email" id="email" required>
        <label for="password">Nueva Contraseña:</label>
        <input type="password" name="password" id="password" required>
        <label for="password_confirmation">Confirmar Contraseña:</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required>
        <button type="submit">Restablecer Contraseña</button>
    </form>
</body>
</html>