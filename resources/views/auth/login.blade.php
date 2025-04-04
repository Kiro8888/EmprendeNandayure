<x-guest-layout>
    <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">

    <div class="login-background">
        <div class="login-card">
            <h2 class="login-title">Iniciar sesión</h2>

            <x-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="input-group">
                    <x-label for="email" value="Correo electrónico"/>
                    <x-input id="email"  style="width:80%" class="input-field" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>

                <div class="input-group mt-4">
                    <x-label for="password" value="Contraseña" />
                    <x-input id="password"  style="width:80%" class="input-field" type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="checkbox-group mt-4">
                    <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" :checked="old('remember')" />
                        <span class="text-sm text-gray-600">Recordarme</span>
                    </label>
                </div>

                <div class="actions mt-4">
                    <x-button class="login-button">
                        Iniciar sesión
                    </x-button>
                    <div style="margin-top: 1rem;">
                        <a href="{{ route('google.login') }}" class="login-button" style="display: inline-block; background-color: #db4437; margin-bottom: 10px; text-decoration: none;">
                            Iniciar sesión con Google
                        </a>
                    </div>
                    @if (Route::has('password.request'))
                        <a class="forgot-password-link" href="{{ route('password.request') }}">
                            ¿Olvidaste tu contraseña?
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
