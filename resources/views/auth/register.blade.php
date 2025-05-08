<x-guest-layout>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">

    @if ($errors->has('cedula') || $errors->has('cellphone') || $errors->has('email') || $errors->has('password'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                title: 'Error de Registro',
                text: '{{ $errors->first('cedula') ?: ($errors->first('cellphone') ?: ($errors->first('email') ?: $errors->first('password'))) }}'
                    .replace('The cellphone has already been taken', 'El número de teléfono ya está registrado')
                    .replace('The cedula has already been taken', 'La cédula ya está registrada')
                    .replace('The email has already been taken', 'El correo ya está registrado')
                    .replace('The password field must be at least 8 characters.', 'La contraseña debe tener al menos 8 caracteres.')
                    .replace('The password field confirmation does not match.', 'La confirmación de la contraseña no coincide.'),
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
        </script>
    @endif

    <div class="register-background">
        <div class="register-card">
            <h2 class="register-title">Registrar cuenta</h2>

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
                    <small class="password-hint">La contraseña debe tener al menos 8 caracteres.</small>
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
