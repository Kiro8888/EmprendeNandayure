<x-guest-layout>
    <style>
        /* Fondo de la página */
        .register-background {
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
        .register-background::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(56, 142, 60, 0.5); /* Verde más oscuro con opacidad */
            z-index: 1; /* Asegura que esté por debajo de la tarjeta de registro */
        }

        /* Tarjeta de registro */
        .register-card {
            background: rgba(255, 255, 255, 0.8);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 500px;
            text-align: center;
            position: relative; /* Para que el contenido de la tarjeta esté sobre el pseudo-elemento */
            z-index: 2; /* Asegura que la tarjeta esté por encima del fondo */
        }

        /* Título */
        .register-title {
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

        /* Botón de registro */
        .register-button {
            background-color: #4d8f35;
            color: #fff;
            padding: 0.5rem 1.5rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            width: 100%;
            margin-top: 1rem;
        }

        .register-button:hover {
            background-color: #3b6f29;
        }

        /* Enlace de usuario registrado */
        .register-link {
            display: block;
            margin-top: 1rem;
            color: #4d8f35;
            text-decoration: none;
            font-size: 0.875rem;
        }

        .register-link:hover {
            text-decoration: underline;
        }
    </style>

    <div class="register-background">
        <div class="register-card">
            <h2 class="register-title">Registrar cuenta</h2>

            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="input-group">
                    <x-label for="name" value="Nombre" />
                    <x-input id="name" class="input-field" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <div class="input-group mt-4">
                    <x-label for="last_name" value="Apellido" />
                    <x-input id="last_name" class="input-field" type="text" name="last_name" :value="old('last_name')" required />
                </div>

                <div class="input-group mt-4">
                    <x-label for="email" value="Correo electrónico" />
                    <x-input id="email" class="input-field" type="email" name="email" :value="old('email')" required autocomplete="username" />
                </div>

                <div class="input-group mt-4">
                    <x-label for="password" value="Contraseña" />
                    <x-input id="password" class="input-field" type="password" name="password" required autocomplete="new-password" />
                </div>

                <div class="input-group mt-4">
                    <x-label for="password_confirmation" value="Confirmar contraseña" />
                    <x-input id="password_confirmation" class="input-field" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4 checkbox-group">
                        <x-checkbox name="terms" id="terms" required />
                        <x-label for="terms">
                            {!! __('Acepto los :terms_of_service y :privacy_policy', [
                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Términos del servicio').'</a>',
                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Política de privacidad').'</a>',
                            ]) !!}
                        </x-label>
                    </div>
                @endif

                <div class="actions mt-4">
                    <a class="register-link" href="{{ route('login') }}">
                        ¿Ya estás registrado?
                    </a>

                    <x-button class="register-button">
                        Registrar
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
