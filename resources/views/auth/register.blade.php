<x-guest-layout>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">

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
