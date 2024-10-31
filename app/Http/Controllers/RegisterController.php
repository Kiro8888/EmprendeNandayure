<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Jetstream;

class RegisterController extends Controller
{
    public function create(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'], // Asegúrate de tener 'password_confirmation' en el formulario
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Crear el nuevo usuario con el estado "En espera"
        $user = User::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'cellphone' => $request->cellphone,
            'cedula'=> $request->cedula,
            'status' => 'En espera', // Establecer el estado por defecto
        ]);

        // Asignar el rol "Entrepreneur" (ID 2)
        $user->assignRole(2); // Asegúrate de que el método assignRole exista en el modelo User

        // Redirigir o devolver respuesta después del registro
        return redirect()->route('home')->with('success', 'Usuario registrado exitosamente.');
    }
}
