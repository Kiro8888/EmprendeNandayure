<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageMiddleware
{
    public function handle($request, Closure $next)
    {
        // Obtener idioma de la sesión o establecer 'es' por defecto
        $locale = Session::get('locale', 'es');
        
        // Aplicar el idioma en la aplicación
        App::setLocale($locale);

        return $next($request);
    }
}
