<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Spatie\Permission\Models\Role;

class SocialiteController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

public function handleGoogleCallback()
{
    try {
        $googleUser = Socialite::driver('google')->user();

        if (!$googleUser) {
            return redirect('/login')->with('error', 'No se pudo obtener la información de Google.');
        }

        // Buscar usuario por email
        $user = User::where('email', $googleUser->getEmail())->first();

        if (!$user) {
          $user = User::create([
    'name' => $googleUser->getName(),
    'email' => $googleUser->getEmail(),
    'last_name' => $googleUser->user['family_name'] ?? '', // Si no lo tiene, guarda vacío
    'password' => bcrypt(uniqid()), 
    'google_id' => $googleUser->getId(),
]);

        }

        Auth::login($user);

        return redirect()->route('dashboard'); // Ajusta esta ruta a tu página principal

    } catch (Exception $e) {
        return redirect('/login')->with('error', 'Error en la autenticación: ' . $e->getMessage());
    }
}


}
