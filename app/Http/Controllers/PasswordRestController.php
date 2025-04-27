<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class PasswordRestController extends Controller
{
    //
    public function showForgotPasswordForm()
    {
        //// Mostrar el formulario de recuperación de contraseña
        return view('Rcontraseña');
    }

    public function sendResetLink(Request $request)
     {   
    // Validar que el campo email sea un correo válido
    $request->validate(['email' => 'required|email']);

    // Verificar si el correo existe en la base de datos
    $user = \App\Models\User::where('email', $request->email)->first();

    if (!$user) {
        // Si el correo no está registrado, enviar un mensaje personalizado
        return back()->withErrors(['email' => 'Este correo no está registrado. Por favor registrate.']);
    }

    // Si el correo existe, enviar el enlace de recuperación
    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => 'Se ha enviado un correo de recuperación a tu dirección de correo electrónico.'])
        : back()->withErrors(['email' => 'No se pudo enviar el correo. Inténtalo de nuevo más tarde.']);
    }

}