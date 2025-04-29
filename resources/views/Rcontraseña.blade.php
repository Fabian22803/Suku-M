<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('Rcontraseña/Rcontraseña.css') }}">
    <script src="{{ asset('Rcontraseña/Rcontraseña.js') }}" defer></script>

    <!-- Font Awesome Icons  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous"/>

    <!-- Google Fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <title>Recuperar contraseña</title>
</head>

<body>
    <div class="card">
    <!-- <p class="lock-icon"><i><link rel="stylesheet" href="imagenes/image.png"></i></p> -->
    @if (session('status'))
            <p style="color: green; font-weight: bold;">{{ session('status') }}</p>
        @endif

        @if ($errors->any())
            <p style="color: red; font-weight: bold;">{{ $errors->first('email') }}</p>
        @endif

    <form method="POST" action="{{ route('password.email') }}">
    @csrf
        <h2>HAS OLVIDADO TU CONTRASEÑA?</h2> 
        <p>Ingresa tu correo para restablecer tu contraseña</p>
        <input type="email" name="email" class="passInput" placeholder="Dirección de correo electrónico" required>
        <button type="submit">Enviar correo de recuperación</button>
    </form>
    <a href="{{ route('register.store') }}">Volver al inicio de sesión</a>
    </div>
</body>

</html>