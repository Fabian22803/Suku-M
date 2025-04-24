<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegistreController extends Controller
{
    //
    public function create(){

        return view('Login');


    }
    public function store(Request $request){

      // Crear un nuevo usuario y guardar en la base de datos
      $registro = new User();
      $registro->name = $request->name;
      $registro->firstName = $request->firstName;
      $registro->lastName = $request->lastName;
      $registro->email = $request->email;
      $registro->password = bcrypt($request->password); // Encriptar la contraseña
      $registro->phone = $request->phone;
      $registro->address = $request->address;
      $registro->role = $request->role;

      $registro->save(); // Guardar en la base de datos

        // return redirect()->route('login.create')->with('success', 'Usuario registro exitosamente');
        // return view('Login');
        
return redirect()->route('login.create')->with('success', '¡Registro exitoso!');
        // return view('Login');
    }
    


}
