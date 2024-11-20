<x-app-layout>
    <x-guest-layout>
        <!-- Hero Section -->
        <section class="w-full bg-cover bg-center h-[600px] flex items-center justify-center relative" style="background-image: url('/client/hero-about.jpg');">
            <div class="absolute inset-0 bg-black opacity-50"></div> <!-- Overlay for darkening -->
            <div class="text-center text-white z-10 px-4 md:px-8">
                <h1 class="text-6xl font-extrabold leading-tight tracking-wide mb-6">Emprende Nandayure</h1>
                <p class="text-lg md:text-2xl font-medium mb-8 max-w-4xl mx-auto">Únete a nuestra plataforma de emprendedores y da el primer paso hacia tu éxito. ¿Estás listo para crear algo increíble?</p>
                <a href="#registro" class="bg-indigo-600 hover:bg-indigo-700 text-white py-4 px-8 rounded-full text-xl font-semibold transition-all duration-300 transform hover:scale-105 " >Comienza Ahora</a>
            </div>
        </section>

        <div class="bg-gray-100 min-h-screen py-12">
       

          <!-- Steps Section -->
<section class="w-full py-16 bg-white shadow-lg rounded-2xl mx-auto mb-16 max-w-7xl">
    <div class="text-center mb-12">
        <h2 class="text-4xl font-bold text-gray-800">¿Cómo Empezar?</h2>
        <p class="text-lg text-gray-600">Sigue estos sencillos pasos para unirte.</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-7xl mx-auto px-4">
        <div class="step-card p-6 bg-indigo-50 rounded-lg shadow-lg text-center transition-transform duration-300 hover:scale-105">
            <div class="bg-indigo-600 text-white p-4 rounded-full mb-4 inline-block">
                <i class="fas fa-user-plus text-3xl"></i>
            </div>
            <h3 class="text-2xl font-semibold text-gray-800 mb-4">Regístrate</h3>
            <p class="text-gray-600">Crea tu cuenta en pocos pasos y entrarás en una lista de espera para ser aceptado en nuestra plataforma.</p>
        </div>
        <div class="step-card p-6 bg-indigo-50 rounded-lg shadow-lg text-center transition-transform duration-300 hover:scale-105">
            <div class="bg-indigo-600 text-white p-4 rounded-full mb-4 inline-block">
                <i class="fas fa-network-wired text-3xl"></i>
            </div>
            <h3 class="text-2xl font-semibold text-gray-800 mb-4">Espera tu Aceptación</h3>
            <p class="text-gray-600">Una vez aceptado, tendrás acceso para registrar tus productos y servicios.</p>
        </div>
        <div class="step-card p-6 bg-indigo-50 rounded-lg shadow-lg text-center transition-transform duration-300 hover:scale-105">
            <div class="bg-indigo-600 text-white p-4 rounded-full mb-4 inline-block">
                <i class="fas fa-cogs text-3xl"></i>
            </div>
            <h3 class="text-2xl font-semibold text-gray-800 mb-4">¡Listo! Visibiliza tus Productos</h3>
            <p class="text-gray-600">Ahora podrás empezar a visibilizar tus productos y servicios, conectando con posibles clientes.</p>
        </div>
    </div>
</section>


            <!-- Cards Section -->
<section class="w-full py-16 bg-gray-200">
    <h2 class="text-4xl font-bold text-center text-gray-800 mb-12">Recursos para Emprendedores</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-12 max-w-7xl mx-auto px-4">
        <div class="card bg-white rounded-lg shadow-xl overflow-hidden transition-transform duration-300 hover:scale-105">
            <img src="/client/resource-1.jpg" alt="Resource 1" class="w-full h-[300px] object-cover">
            <div class="p-6">
                <h3 class="text-2xl font-semibold text-gray-800 mb-4">Visibiliza tus Productos</h3>
                <p class="text-gray-600">Publica tus productos en nuestra plataforma para que los potenciales clientes puedan encontrarlos fácilmente y hacerles llegar cotizaciones.</p>
            </div>
        </div>
        <div class="card bg-white rounded-lg shadow-xl overflow-hidden transition-transform duration-300 hover:scale-105">
            <img src="/client/resource-2.jpg" alt="Resource 2" class="w-full h-[300px] object-cover">
            <div class="p-6">
                <h3 class="text-2xl font-semibold text-gray-800 mb-4">Recibe Cotizaciones</h3>
                <p class="text-gray-600">Conecta con posibles clientes que te enviarán cotizaciones basadas en los productos que ofreces, facilitando las negociaciones.</p>
            </div>
        </div>
        <div class="card bg-white rounded-lg shadow-xl overflow-hidden transition-transform duration-300 hover:scale-105">
            <img src="/client/resource-3.jpg" alt="Resource 3" class="w-full h-[300px] object-cover">
            <div class="p-6">
                <h3 class="text-2xl font-semibold text-gray-800 mb-4">Anuncios de Ferias</h3>
                <p class="text-gray-600">Mantente informado sobre las ferias y eventos donde podrás mostrar tus productos y conectar con más clientes potenciales.</p>
            </div>
        </div>
    </div>
</section>


            <!-- Registration Form Section -->
            <section id="registro" class="container mx-auto px-4 py-16 flex flex-col md:flex-row items-center justify-center">
                <div class="w-full md:w-1/2 bg-white p-8 rounded-lg shadow-xl">
                    <x-authentication-card>
                        <x-slot name="logo">
                            <x-authentication-card-logo />
                        </x-slot>
                        <x-validation-errors class="mb-4" />
                        <form method="POST" action="{{ route('registerEmprendedor') }}">
                            @csrf
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
                                <x-button class="w-full py-3 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 transition-all duration-200">
                                    {{ __('Registrarme') }}
                                </x-button>
                            </div>
                        </form>
                    </x-authentication-card>
                </div>
            </section>
        </div>
    </x-guest-layout>
    <!-- Footer Start -->
<x-footer-client />
<!-- Footer End -->

</x-app-layout>