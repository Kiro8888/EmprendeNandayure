<x-app-layout>
    <!-- Hero Section -->
    <div class="hero">
        <div class="hero-content">
            <h1 class="text-5xl font-extrabold tracking-wide">Servicios</h1>
            <p class="text-lg mt-2">Descubre una amplia variedad de servicios al mejor precio.</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="bg-gray-100 py-12" style="background: #dddddd;">
        <div class="container mx-auto px-4 lg:px-8">
            <h1 class="text-4xl font-bold mb-10 text-center text-gray-800">Explora nuestros servicios</h1>

            <div class="flex">
                <!-- Filtro de Precio -->
                <div class="w-1/4 pr-6">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-xl font-bold mb-4 text-gray-700">Filtrar por precio</h2>
                        <form action="{{ route('client.services') }}" method="GET">
                            <div class="mb-4">
                                <label for="min_price" class="block text-gray-600">Precio mínimo</label>
                                <input type="number" name="min_price" id="min_price" class="w-full px-3 py-2 border rounded-md" placeholder="₡0" value="{{ request('min_price') }}">
                            </div>
                            <div class="mb-4">
                                <label for="max_price" class="block text-gray-600">Precio máximo</label>
                                <input type="number" name="max_price" id="max_price" class="w-full px-3 py-2 border rounded-md" placeholder="₡100000" value="{{ request('max_price') }}">
                            </div>
                            <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700 transition duration-200" style="background-color: #009A00;">Filtrar</button>
                        </form>
                    </div>
                </div>

                <!-- Contenedor para Servicios -->
                <div class="w-3/4">
                    @if($services->isNotEmpty())
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">
                            @foreach ($services as $service)
                                <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform transform hover:scale-105">
                                    <div class="relative">
                                        <img src="{{ $service->srv_img }}" alt="{{ $service->srv_name }}" class="w-full h-40 object-cover">
                                        <span class="absolute top-2 left-2 bg-orange-500 text-white text-xs font-bold px-2 py-1 rounded">New</span>
                                    </div>
                                    <div class="p-4">
                                        <h2 class="text-lg font-bold text-gray-800 text-center">{{ $service->srv_name }}</h2>
                                        <div class="flex items-center justify-center space-x-2 mt-2">
                                            <span class="text-green-600 font-bold text-xl">₡{{ number_format($service->srv_price, 2) }}</span>
                                        </div>
                                        <!-- Botón Ver Más -->
                                        <div class="mt-4">
                                            <a href="{{ route('client.service_details', $service->id_srv) }}" 
                                               class="w-full inline-block text-center text-white py-2 px-4 rounded-md transition duration-200 hover:bg-green-700" 
                                               style="background-color: #009A00;">
                                                Ver más
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Paginación -->
                        <div class="mt-6">
                            {{-- {{ $services->links() }} --}}
                        </div>
                    @else
                        <p class="text-center text-gray-600">No hay servicios disponibles en este rango de precio.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <x-footer-client />

    <!-- Additional Styles -->
    <style>
        .hero {
            background: linear-gradient(to bottom right, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.5)), url('/client/hero-Services.jpg') no-repeat center center/cover;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-align: center;
            position: relative;
        }
        .hero-content {
            background: rgba(0, 0, 0, 0.5);
            padding: 2rem;
            border-radius: 10px;
        }
    </style>
</x-app-layout>
