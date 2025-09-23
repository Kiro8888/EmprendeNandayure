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

            <form method="POST" action="{{ route('login') }} " style="margin-bottom: 25px">
                @csrf

                <div class="input-group">
                    <x-label for="email" value="Correo electrónico"/>
                    <x-input id="email"  style="width:80%" class="input-field" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>

                <div class="input-group mt-4">
                    <x-label for="password" value="Contraseña" />
                    <x-input id="password"  style="width:80%" class="input-field" type="password" name="password" required autocomplete="current-password" />
                </div>

                {{-- <div class="checkbox-group mt-4">
                    <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" :checked="old('remember')" />
                        <span class="text-sm text-gray-600">Recordarme</span>
                    </label>
                </div> --}}

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
            <button style="position: absolute; bottom: 10px; left: 10px; background-color: #4CAF50; color: white; border: none; padding: 10px 10px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; cursor: pointer; border-radius: 5px;">
                <a href="{{ route('home') }}" class="register-link" style="color: white; text-decoration: none;">
                    <span style="transition: transform 0.2s, box-shadow 0.2s; display: inline-block;" onmouseover="this.style.boxShadow='0px 4px 8px rgba(0, 0, 0, 0.2)'" onmouseout="this.style.boxShadow='none'">&#8592;</span> <!-- HTML entity for a left arrow -->
                </a>
            </button>
        </div>
    </div>
</x-guest-layout>
