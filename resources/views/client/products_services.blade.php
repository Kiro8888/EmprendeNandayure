<x-app-layout>
    <!-- Hero Section -->
    <div class="hero">
        <div class="hero-content">
            <h1 class="text-4xl font-extrabold">Productos y Servicios</h1>
            <p class="text-lg mt-2">Descubre una amplia variedad de productos y servicios a los mejores precios.</p>
        </div>
    </div>

    <!-- Main Content -->
    <body class="bg-gray-100">
        <div class="container mx-auto p-6">
            <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Productos y Servicios</h1>

            <!-- Filtro -->
            <div class="mb-6 flex justify-center">
                <form method="GET" action="{{ route('client.products_services.index') }}" class="w-full max-w-xs">
                    <select name="type" onchange="this.form.submit()" class="block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="All">Todos</option>
                        <option value="product" {{ request('type') === 'product' ? 'selected' : '' }}>Productos</option>
                        <option value="service" {{ request('type') === 'service' ? 'selected' : '' }}>Servicios</option>
                    </select>
                </form>
            </div>

            <!-- Contenedor para Productos -->
            @if($products->isNotEmpty())
                <h2 class="text-2xl font-semibold mb-4 text-indigo-600">Productos</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                    @foreach ($products as $product)
                        <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                            <!-- Mostrar imagen -->
                            <img src="{{ $product->pdt_img }}" alt="{{ $product->pdt_name }}" class="w-full h-48 object-cover rounded-md mb-4">
                            
                            <!-- Mostrar nombre -->
                            <h2 class="text-xl font-bold text-gray-800">{{ $product->pdt_name }}</h2>
                            
                            <!-- Mostrar descripción -->
                            <p class="text-gray-600 mt-2">{{ $product->pdt_description }}</p>
                            
                            <!-- Mostrar precio -->
                            <p class="text-gray-900 font-bold mt-4">₡{{ number_format($product->pdt_price, 2) }}</p>
                        </div>
                    @endforeach
                </div>
            @endif

            <!-- Contenedor para Servicios -->
            @if($services->isNotEmpty())
                <h2 class="text-2xl font-semibold mb-4 text-indigo-600">Servicios</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                    @foreach ($services as $service)
                        <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                            <!-- Mostrar imagen -->
                            <img src="{{ $service->srv_img }}" alt="{{ $service->srv_name }}" class="w-full h-48 object-cover rounded-md mb-4">
                            
                            <!-- Mostrar nombre -->
                            <h2 class="text-xl font-bold text-gray-800">{{ $service->srv_name }}</h2>
                            
                            <!-- Mostrar descripción -->
                            <p class="text-gray-600 mt-2">{{ $service->srv_description }}</p>
                            
                            <!-- Mostrar precio -->
                            <p class="text-gray-900 font-bold mt-4">₡{{ number_format($service->srv_price, 2) }}</p>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </body>

    <!-- Additional Styles -->
    <style>
        .hero {
            background: url('/client/Producs_Service-hero.jpg') no-repeat center center/cover;
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
            margin-bottom: 0.5rem;
        }

        .hero p {
            font-size: 1.25rem;
        }

        .container {
            max-width: 1200px;
        }
    </style>
</x-app-layout>
