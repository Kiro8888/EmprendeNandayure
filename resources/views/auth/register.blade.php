<x-guest-layout>
    <style>
        /* General styles */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .register-background {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #a7cd63;
            background-image: url('/images/login/fondo.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            position: relative;
        }

        .register-background::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(56, 142, 60, 0.5);
            z-index: 1;
        }

        .register-card {
            background: rgba(255, 255, 255, 0.9);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 500px;
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .register-title {
            font-size: 1.8rem;
            color: #4d8f35;
            margin-bottom: 1.5rem;
        }

        .input-group {
            margin-bottom: 1.5rem;
            text-align: left;
        }

        .input-group label {
            display: block;
            font-size: 0.9rem;
            color: #4d8f35;
            margin-bottom: 0.5rem;
        }

        .input-group input {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #4d8f35;
            border-radius: 5px;
            font-size: 1rem;
            color: #333;
            background-color: #f9f9f9;
        }

        .input-group input:focus {
            outline: none;
            border-color: #3b6f29;
            box-shadow: 0 0 5px rgba(59, 111, 41, 0.5);
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
            color: #4d8f35;
        }

        .register-button {
            background-color: #4d8f35;
            color: #fff;
            padding: 0.8rem 1.5rem;
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

        .register-link {
            display: block;
            margin-top: 1rem;
            color: #4d8f35;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .register-link:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .register-card {
                padding: 1.5rem;
            }

            .register-title {
                font-size: 1.5rem;
            }

            .input-group input {
                padding: 0.6rem;
            }

            .register-button {
                padding: 0.6rem 1rem;
                font-size: 0.9rem;
            }
        }
    </style>

    <div class="register-background">
        <div class="register-card">
            <h2 class="register-title">Registrar cuenta</h2>

            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="input-group">
                    <label for="name">Nombre</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                </div>

                <div class="input-group">
                    <label for="last_name">Apellido</label>
                    <input id="last_name" type="text" name="last_name" value="{{ old('last_name') }}" required>
                </div>

                <div class="input-group">
                    <label for="email">Correo electrónico</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
                </div>

                <div class="input-group">
                    <label for="password">Contraseña</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password">
                </div>

                <div class="input-group">
                    <label for="password_confirmation">Confirmar contraseña</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="checkbox-group">
                        <input type="checkbox" name="terms" id="terms" required>
                        <label for="terms">
                            {!! __('Acepto los :terms_of_service y :privacy_policy', [
                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline">'.__('Términos del servicio').'</a>',
                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline">'.__('Política de privacidad').'</a>',
                            ]) !!}
                        </label>
                    </div>
                @endif

                <button type="submit" class="register-button">Registrar</button>

                <a class="register-link" href="{{ route('login') }}">¿Ya estás registrado?</a>
            </form>
        </div>
    </div>
</x-guest-layout>
