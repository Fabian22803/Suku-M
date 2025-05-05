<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{

public function create()
 {
     return view('Login');
 }
 
    public function ShowRegisterForm()
    {
        return view('register');
    }
 public function store(Request $request)
 {
     // Validate the request data
     $request->validate([
         'name' => 'required|string|max:255',
         'lastName' => 'required|string|max:255',
         'email' => 'required|string|email|max:255|unique:users',
         'password' => 'required|string|min:8|confirmed',
         'phone' => 'required|string|max:15',
         'address' => 'required|string|max:255',
         'role' => 'required|string|max:50',
     ]);

     // Create a new user and save to the database
     $user = new User();
     $user->name = $request->name;
     $user->lastName = $request->lastName;
     $user->email = $request->email;
     $user->password = bcrypt($request->password); // Encrypt the password
     $user->phone = $request->phone;
     $user->address = $request->address;
     $user->role = $request->role;

     $user->save(); // Save to the database

     return redirect()->route('inicio')->with('success', '¡Registro exitoso! Por favor, inicia sesión.');
 }



 public function login(Request $request)
 {
     $credentials = $request->only('email', 'password');

     if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
    
        return redirect()->route('home')->with('success', 'Login successful');
        }
         
     }

 
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect ()->route('login.form')->with('success', 'Logout successful');
    }
  
}
