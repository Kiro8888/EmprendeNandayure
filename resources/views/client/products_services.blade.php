<x-app-layout>
    <!-- Hero Section -->
    <div class="hero">
        <div class="hero-content">
            <h1 class="text-5xl font-extrabold tracking-wide">Productos y Servicios</h1>
            <p class="text-lg mt-2">Descubre una amplia variedad de productos y servicios al mejor precio.</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="bg-gray-100 py-12">
        <div class="container mx-auto px-4 lg:px-8">
            <h1 class="text-4xl font-bold mb-10 text-center text-gray-800">Explora nuestros productos y servicios</h1>

            <!-- Filtro -->
            <div class="mb-10 flex justify-center">
                <form method="GET" action="{{ route('client.products_services.index') }}" class="w-full max-w-md">
                    <select name="type" onchange="this.form.submit()" class="block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 transition ease-in-out duration-150">
                        <option value="All">Todos</option>
                        <option value="product" {{ request('type') === 'product' ? 'selected' : '' }}>Productos</option>
                        <option value="service" {{ request('type') === 'service' ? 'selected' : '' }}>Servicios</option>
                    </select>
                </form>
            </div>

            <!-- Contenedor para Productos -->
            @if($products->isNotEmpty())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
                    @foreach ($products as $product)
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300">
                            <img src="{{ $product->pdt_img }}" alt="{{ $product->pdt_name }}" class="w-full h-56 object-cover">
                            <div class="p-6">
                                <h2 class="text-2xl font-bold text-gray-800">{{ $product->pdt_name }}</h2>
                                <p class="text-gray-600 mt-2">{{ $product->pdt_description }}</p>
                                <p class="text-lg font-bold text-indigo-600 mt-4">₡{{ number_format($product->pdt_price, 2) }}</p>
                                <a href="{{ route('client.product_details', $product->id_pdt) }}" class="block mt-6 text-center bg-indigo-600 text-white py-3 rounded-md hover:bg-indigo-700 transition duration-200">
                                    Ver más
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <!-- Contenedor para Servicios -->
            @if($services->isNotEmpty())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
                    @foreach ($services as $service)
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300">
                            <img src="{{ $service->srv_img }}" alt="{{ $service->srv_name }}" class="w-full h-56 object-cover">
                            <div class="p-6">
                                <h2 class="text-2xl font-bold text-gray-800">{{ $service->srv_name }}</h2>
                                <p class="text-gray-600 mt-2">{{ $service->srv_description }}</p>
                                <p class="text-lg font-bold text-indigo-600 mt-4">₡{{ number_format($service->srv_price, 2) }}</p>
                                <a href="{{ route('client.service_details', $service->id_srv) }}" class="block mt-6 text-center bg-indigo-600 text-white py-3 rounded-md hover:bg-indigo-700 transition duration-200">
                                    Ver más
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <!-- Additional Styles -->
    <style>
        .hero {
            background: linear-gradient(to bottom right, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.5)), url('/client/Producs_Service-hero.jpg') no-repeat center center/cover;
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
        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }
        .hero p {
            font-size: 1.25rem;
        }
        .container {
            max-width: 1200px;
        }
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</x-app-layout>
