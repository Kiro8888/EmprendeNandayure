<x-app-layout>
    <x-guest-layout>
        <!-- Hero Section -->
<section class="w-full bg-cover bg-center h-[600px] flex items-center justify-center relative" style="background-image: url('/client/hero-about.jpeg'); height: 600px;">
    <div class="absolute inset-0 bg-black opacity-50"></div> <!-- Overlay for darkening -->
    <div class="text-center text-white z-10 px-4 md:px-8">
        <h1 class="text-6xl font-extrabold leading-tight tracking-wide mb-6">Emprende Nandayure</h1>
        <p class="text-lg md:text-2xl font-medium mb-8 max-w-4xl mx-auto">Unite a la plataforma y descubrí los beneficios que tenemos para tu negocio. Registrate gratis y empezá hoy mismo.</p>
        <a href="#" class="bg-green-600 hover:bg-green-700 text-white py-4 px-8 rounded-full text-xl font-semibold transition-all duration-300 transform hover:scale-105">Comienza Ahora</a>
    </div>
</section>



        <div class="bg-gray-100 min-h-screen py-12">
        
        @if (session('success'))
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                Swal.fire({
                    title: '¡Registro Exitoso!',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                });
            </script>
        @endif

@if ($errors->has('cedula') || $errors->has('cellphone') || $errors->has('email'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            title: 'Error de Registro',
            text: '{{ $errors->first('cedula') ?: ($errors->first('cellphone') ?: $errors->first('email')) }}'
                .replace('The cellphone has already been taken', 'El número de teléfono ya está registrado')
                .replace('The cedula has already been taken', 'La cédula ya está registrada')
                .replace('The email has already been taken', 'El correo ya está registrado'),
            icon: 'error',
            confirmButtonText: 'Aceptar'
        });
    </script>
@endif

<style>  
 i, .fa {
    color: #009A00 !important;
}</style>
         <!-- Steps Section -->
<section class="w-full py-16 bg-white shadow-lg rounded-2xl mx-auto mb-16 max-w-7xl">
    <div class="text-center mb-12">
        <h2 class="text-4xl font-bold text-gray-800">¿Cómo Empezar?</h2>
        <p class="text-lg text-gray-600">Sigue estos sencillos pasos para unirte.</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-7xl mx-auto px-4">
        <div class="step-card p-6 bg-indigo-50 rounded-lg shadow-lg text-center transition-transform duration-300 hover:scale-105">
            <div class="bg-white text-green-600 p-4 rounded-full mb-4 inline-block">
                <i class="fas fa-user-plus text-3xl"></i>
            </div>
            <h3 class="text-2xl font-semibold text-gray-800 mb-4">Regístrate</h3>
            <p class="text-gray-600">Crea tu cuenta en pocos pasos y entrarás en una lista de espera para ser aceptado en nuestra plataforma.</p>
        </div>
        <div class="step-card p-6 bg-indigo-50 rounded-lg shadow-lg text-center transition-transform duration-300 hover:scale-105">
            <div class="bg-white text-green-600 p-4 rounded-full mb-4 inline-block">
                <i class="fas fa-network-wired text-3xl"></i>
            </div>
            <h3 class="text-2xl font-semibold text-gray-800 mb-4">Espera tu Aceptación</h3>
            <p class="text-gray-600">Una vez aceptado, tendrás acceso para registrar tus productos y servicios.</p>
        </div>
        <div class="step-card p-6 bg-indigo-50 rounded-lg shadow-lg text-center transition-transform duration-300 hover:scale-105">
            <div class="bg-white text-green-600 p-4 rounded-full mb-4 inline-block">
                <i class="fas fa-cogs text-3xl"></i>
            </div>
            <h3 class="text-2xl font-semibold text-gray-800 mb-4">¡Listo! Visibiliza tus Productos</h3>
            <p class="text-gray-600">Ahora podrás empezar a visibilizar tus productos y servicios, conectando con posibles clientes.</p>
        </div>
    </div>
</section>



       


            <!-- Registration Form Section -->
            <section id="registro" class="container mx-auto px-4 py-16">
                <div class="flex flex-col md:flex-row items-center justify-between bg-white shadow-xl rounded-lg overflow-hidden">
                    <!-- Left Column: Form -->
                    <div class="w-full md:w-1/2 p-8">
                        <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">¡Regístrate Ahora!</h2>
                        <p class="text-gray-600 text-center mb-8">
                            Completa el siguiente formulario para comenzar a promocionar tus productos o servicios.
                        </p>
                        <form method="POST" action="{{ route('registerEmprendedor') }}">
                            @csrf
                            <div class="mb-4">
                                <x-label for="name" value="{{ __('Nombre de emprendedor') }}" />
                                <x-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required />
                            </div>
                            <div class="mb-4">
                                <x-label for="last_name" value="{{ __('Apellido de emprendedor') }}" />
                                <x-input id="last_name" class="block w-full mt-1" type="text" name="last_name" :value="old('last_name')" required />
                            </div>
                            <div class="mb-4">
                                <x-label for="cellphone" value="{{ __('Número de teléfono') }}" />
                                <x-input id="cellphone" class="block w-full mt-1" type="text" name="cellphone" :value="old('cellphone')" required maxlength="8" pattern="\d{8}" title="Debe contener exactamente 8 dígitos" />
                            </div>
                            <div class="mb-4">
                                <x-label for="cedula" value="{{ __('Cédula del emprendedor') }}" />
                                <x-input id="cedula" class="block w-full mt-1" type="text" name="cedula" :value="old('cedula')" required maxlength="9" pattern="\d{9}" title="Debe contener exactamente 9 dígitos" />
                            </div>
                            <div class="mb-4">
                                <x-label for="email" value="{{ __('Correo del emprendedor') }}" />
                                <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autocomplete="username" />
                            </div>
                            <div class="mb-4">
                                <x-label for="password" value="{{ __('Contraseña') }}" />
                                <x-input id="password" class="block w-full mt-1" type="password" name="password" required autocomplete="new-password" />
                            </div>
                            <div class="mb-4">
                                <x-label for="password_confirmation" value="{{ __('Confirmar contraseña') }}" />
                                <x-input id="password_confirmation" class="block w-full mt-1" type="password" name="password_confirmation" required autocomplete="new-password" />
                            </div>
                            <div class="mt-6">
                                <x-button class="w-full py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-all duration-200">
                                    {{ __('Registrarme') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Right Column: Image and Description -->
                    <div class="w-full md:w-1/2 bg-gray-50 flex flex-col items-center justify-center p-8">
                        <div class="video-container bg-gray-200 rounded-lg p-4 flex items-center justify-center relative">
                            <div class="square-background absolute inset-0 -translate-x-1/2 -translate-y-1/2"></div>
                            <video class="video-fondo rounded-lg shadow-lg border-4 border-green-600 relative z-10" autoplay muted loop>
                                <source src="/client/register-image.mp4" type="video/mp4">
                                Tu navegador no soporta videos HTML5.
                            </video>
                        </div>
                        <p class="text-gray-600 text-lg text-center mt-4">
                            Sumate y hacé que más personas conozcan tu negocio.
                        </p>
                    </div>
                </div>
            </section>
            

            
        </div>
    </x-guest-layout>
    <!-- Footer Start -->
<x-footer-client />
<!-- Footer End -->

</x-app-layout>