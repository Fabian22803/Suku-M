<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iniciar sesion y Registrarte</title>
    
    <link rel="stylesheet" href="{{ asset('Login/Login.css') }}">
    <script src="{{ asset('Login/Login.js') }}" defer></script>
</head>
<body>
<!-- para que apararezca el registro exitoso -->
@if(session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
@endif

    <div class="box">
    <style>
    body {
        background-image: url("{{ asset('images/portada.jpg') }}");
    }
</style>
        </style>

        <img src="{{ asset('images/icono.jpg') }}" class="rounded">
        <div class="page">
            <div class="header">
                <a id="login" class="active" href="#login">Iniciar sesion</a>
                <a id="signup"  href="#signup">Registrarte</a>
            </div>
            <div id="errorMsg"></div>
            <div class="content">
                <form class="login" name="loginForm" onsubmit="return validateLoginForm()" method="POST">
                <select name="role" id="signRole" required>
                            <option value="" disabled selected>Selecciona un rol</option>
                            <option value="superadmin">SuperAdministrador</option>
                            <option value="admin">Administrador</option>
                            <option value="user">Usuario</option>
                        </select>
                    <input type="text" name="name" id="logName" placeholder="Usuario">
                    <input type="password" name="password" id="logPassword" placeholder="Contraseña">
                    <div id="check">
                        <input type="checkbox" id="remember">
                        <label for="remember">Recuerdame</label>
                    </div>
                    <br><br>
                    <input type="submit" value="Iniciar sesion">
                    <a href="{{ route('password.request') }}">Olvidaste tu contraseña?</a>
                </form>

                 <!-- <form class="signup" name="signupForm" onsubmit="return validateSignupForm()" action="{{ route('register.store') }}" method="POST">  -->
                        <form action="{{ route('register.store') }}" method="POST">
                            @csrf
                        <input type="text" name="name" id="signName" placeholder="Usuario" required>
                        <input type="text" name="firstName" id="signFirstName" placeholder="Primer apellido" required>
                        <input type="text" name="lastName" id="signLastName" placeholder="Segundo apellido">
                        <input type="email" name="email" id="signEmail" placeholder="Correo electrónico" required>
                        <input type="password" name="password" id="signPassword" placeholder="Contraseña">
                        <input type="text" name="phone" id="signPhone" placeholder="Teléfono" required>
                        <input type="text" name="address" id="signAddress" placeholder="Dirección">
                        <select name="role" id="signRole" required>
                            <option value="" disabled selected>Selecciona un rol</option>
                            <option value="superadmin">SuperAdministrador</option>
                            <option value="admin">Administrador</option>
                            <option value="user">Usuario</option>
                        </select>
                    <br><br>
                    <input type="submit" value="Registrarte">
                </form>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

</body>
</html>
