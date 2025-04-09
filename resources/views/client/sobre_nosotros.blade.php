<x-app-layout>
    <x-guest-layout>
        <!-- Hero Section -->
<section class="w-full bg-cover bg-center h-[600px] flex items-center justify-center relative" style="background-image: url('/client/hero-about.jpg'); height: 600px;">
    <div class="absolute inset-0 bg-black opacity-50"></div> <!-- Overlay for darkening -->
    <div class="text-center text-white z-10 px-4 md:px-8">
        <h1 class="text-6xl font-extrabold leading-tight tracking-wide mb-6">Emprende Nandayure</h1>
        <p class="text-lg md:text-2xl font-medium mb-8 max-w-4xl mx-auto">Únete a nuestra plataforma de emprendedores y da el primer paso hacia tu éxito. ¿Estás listo para crear algo increíble?</p>
        <a href="#" class="bg-green-600 hover:bg-green-700 text-white py-4 px-8 rounded-full text-xl font-semibold transition-all duration-300 transform hover:scale-105">Comienza Ahora</a>
    </div>
</section>



        <div class="bg-gray-100 min-h-screen py-12">
       
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
                                <x-label for="cellphone" value="{{ __('Celular del emprendedor') }}" />
                                <x-input id="cellphone" class="block w-full mt-1" type="text" name="cellphone" :value="old('cellphone')" required maxlength="8" pattern="\d{8}" title="Debe contener exactamente 8 dígitos" />
                                
                                @error('cellphone')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <x-label for="cedula" value="{{ __('Cédula del emprendedor') }}" />
                                <x-input id="cedula" class="block w-full mt-1" type="text" name="cedula" :value="old('cedula')" required maxlength="9" pattern="\d{9}" title="Debe contener exactamente 9 dígitos" />

                                @error('cedula')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                            </div>
                            <div class="mb-4">
                                <x-label for="email" value="{{ __('Correo del emprendedor') }}" />
                                <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autocomplete="username" />
                                @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                            </div>
                            <div class="mb-4">
                                <x-label for="password" value="{{ __('Contraseña') }}" />
                                <x-input id="password" class="block w-full mt-1" type="password" name="password" required autocomplete="new-password" />
                            </div>
                            <div class="mb-4">
                                <x-label for="password_confirmation" value="{{ __('Confirmar contraseña') }}" />
                                <x-input id="password_confirmation" class="block w-full mt-1" type="password" name="password_confirmation" required autocomplete="new-password" />
                                @error('password')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
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
                        <img src="/client/register-image.jpg" alt="Promoción de emprendedores" class="w-3/4 mb-6 rounded-lg shadow-lg">
                        <p class="text-gray-600 text-lg text-center">
                            ¡Únete a una red de emprendedores apasionados!.
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