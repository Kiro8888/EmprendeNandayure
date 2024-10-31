<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

use App\Models\User; // Asegúrate de importar el modelo User
use App\Actions\Auth\LoginUser;
class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
        
        // Personalizar la autenticación
        Fortify::authenticateUsing(function (Request $request) {
            // Validar las credenciales
            $user = User::where('email', $request->input('email'))->first();
    
            if ($user) {
                if ($user->status === 'En espera') {
                    // Lanza una excepción si el usuario está en espera
                    throw ValidationException::withMessages([
                        'email' => 'Tu cuenta está en espera y no puedes iniciar sesión.',
                    ]);
                }
    
                // Intentar autenticar al usuario
                if (Hash::check($request->input('password'), $user->password)) {
                    return $user; // Retornar el usuario autenticado
                }
            }
    
            // Si las credenciales son incorrectas
            return null;
        });
        
        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());
            return Limit::perMinute(5)->by($throttleKey);
        });
    
        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}
