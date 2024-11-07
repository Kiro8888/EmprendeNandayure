<x-app-layout>
    <x-guest-layout>
        <section class="w-full bg-cover bg-center h-64 flex items-center justify-center" style="background-image: url('/client/hero-about.jpg');">
            <div class="text-center text-white">
                <h1 class="text-4xl font-bold mb-2">Conviértete en un Emprendedor</h1>
                <p class="text-lg max-w-md mx-auto">Únete a nuestra comunidad para conectar, aprender y llevar tu idea al siguiente nivel.</p>
            </div>
        </section>

        <div class="bg-gray-100 min-h-screen flex items-center justify-center">
            <!-- Hero Section -->
            <section class="w-full bg-cover bg-center h-64 flex items-center justify-center" >
                <!-- Steps Section on the Left -->
                <div class="md:w-1/2 p-6">
                    <h2 class="text-3xl font-bold mb-4">Pasos para Registrarte</h2>
                    <ul class="list-decimal list-inside text-lg text-gray-700 space-y-4">
                        <li><strong>Completa tus datos:</strong> Proporciona tu información básica.</li>
                        <li><strong>Conéctate con otros:</strong> Accede a nuestra red de contactos.</li>
                        <li><strong>Recibe recursos exclusivos:</strong> Accede a herramientas y capacitaciones.</li>
                        <li><strong>Impulsa tu proyecto:</strong> Promociona y recibe visibilidad en nuestra plataforma.</li>
                    </ul>
                </div>

            </section>

            <!-- Main Section with Steps and Form -->
            <section class="container mx-auto px-4 py-12 flex flex-col md:flex-row">
                <!-- Registration Form Section on the Right -->
                    <x-authentication-card>
                        <x-slot name="logo">
                            <x-authentication-card-logo />
                        </x-slot>
                        <x-validation-errors class="mb-4" />
                        <form method="POST" action="{{ route('registerEmprendedor') }}">
                            @csrf
                            <!-- Form fields -->
                            <div>
                                <x-label for="name" value="{{ __('Nombre') }}" />
                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            </div>
            
                            <div class="mt-4">
                                <x-label for="last_name" value="{{ __('Apellido') }}" />
                                <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required />
                            </div>
            
                            <div class="mt-4">
                                <x-label for="cellphone" value="{{ __('Celular') }}" />
                                <x-input id="cellphone" class="block mt-1 w-full" type="number" name="cellphone" :value="old('cellphone')" required />
                            </div>
            
                            <div class="mt-4">
                                <x-label for="cedula" value="{{ __('Cédula') }}" />
                                <x-input id="cedula" class="block mt-1 w-full" type="number" name="cedula" :value="old('cedula')" required />
                            </div>
            
                            <div class="mt-4">
                                <x-label for="email" value="{{ __('Correo Electrónico') }}" />
                                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                            </div>
            
                            <div class="mt-4">
                                <x-label for="password" value="{{ __('Contraseña') }}" />
                                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
                            </div>
            
                            <div class="mt-4">
                                <x-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
                                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
                            </div>
            
                            <div class="flex items-center justify-end mt-4">
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                    {{ __('¿Ya estás registrado?') }}
                                </a>
            
                                <x-button class="ml-4">
                                    {{ __('Registrarse') }}
                                </x-button>
                            </div>
                        </form>
                    </x-authentication-card>
            </section>   
        </div>
    </x-guest-layout>

    <x-footer-client />    
</x-app-layout>
