<x-guest-layout>
    <style>
        /* Fondo de la página */
        .login-background {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #a7cd63; /* Color de fondo en caso de que la imagen no cargue */
            background-image: url('/images/login/fondo.jpg'); /* Cambia a la ruta de tu imagen de fondo */
            background-size: cover;
            background-repeat: no-repeat;
            position: relative;
            overflow: hidden; /* Asegura que el pseudo-elemento se mantenga dentro del contenedor */
        }

        /* Efecto verde siempre presente */
        .login-background::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(56, 142, 60, 0.5); /* Verde más oscuro con opacidad */
            z-index: 1; /* Asegura que esté por debajo de la tarjeta de login */
        }

        /* Tarjeta de login */
        .login-card {
            background: rgba(255, 255, 255, 0.8);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 300px;
            text-align: center;
            position: relative; /* Para que el contenido de la tarjeta esté sobre el pseudo-elemento */
            z-index: 2; /* Asegura que la tarjeta esté por encima del fondo */
        }

        /* Título */
        .login-title {
            font-size: 1.5rem;
            color: #4d8f35;
            margin-bottom: 1rem;
        }

        /* Grupo de entradas de formulario */
        .input-group {
            position: relative;
            margin-bottom: 1rem;
        }

        .input-field {
            width: 100%;
            padding: 0.5rem 2.5rem 0.5rem 0.5rem;
            border: 1px solid #4d8f35;
            border-radius: 5px;
            font-size: 1rem;
            color: #4d8f35;
            background-color: #f4f4f4;
        }

        /* Iconos dentro de los campos */
        .input-group::before {
            /* Cambia el icono según el campo */
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
        }

        /* Checkbox */
        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* Botón de login */
        .login-button {
            background-color: #4d8f35;
            color: #fff;
            padding: 0.5rem 1.5rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            /* width: 100%; */
            margin-top: 1rem;
        }

        .login-button:hover {
            background-color: #3b6f29;
        }

        /* Enlace de contraseña olvidada */
        .forgot-password-link {
            display: block;
            margin-bottom: 1rem;
            color: #4d8f35;
            text-decoration: none;
            font-size: 0.875rem;
        }

        .forgot-password-link:hover {
            text-decoration: underline;
        }
    </style>

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
                    <x-label for="email" value="Correo electrónico" />
                    <x-input id="email" class="input-field" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>

                <div class="input-group mt-4">
                    <x-label for="password" value="Contraseña" />
                    <x-input id="password" class="input-field" type="password" name="password" required autocomplete="current-password" />
                </div>

  

                <div class="checkbox-group mt-4">
                    <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" />
                        <span class="text-sm text-gray-600">Recordarme</span>
                    </label>
                </div>

                <div class="actions mt-4">
                    <x-button class="login-button">
                        Iniciar sesión
                    </x-button>
                    <div style="margin-top: 1rem;">
                        <a href="{{ route('google.login') }}" class="login-button" style="display: inline-block; background-color: #db4437;     margin-bottom: 10px;">
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
