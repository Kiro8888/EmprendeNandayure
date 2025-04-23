<x-app-layout>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $entrepreneurship->etp_name }} - Detalles</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ asset('css/entrepreneurship-details.css') }}" rel="stylesheet">
    </head>
    <body>
        <!-- Hero Section -->
        <div class="hero">
            <div class="hero-content">
                <h1>{{ $entrepreneurship->etp_name }}</h1>
                <p>Descubre una amplia variedad de productos al mejor precio.</p>
            </div>
        </div>

        <!-- Emprendimiento Details -->
        <div class="container-details">
            <img src="{{ $entrepreneurship->etp_img ? asset($entrepreneurship->etp_img) : 'https://via.placeholder.com/180x180' }}" alt="{{ $entrepreneurship->etp_name }}">
            <div>
                <h2>Detalles del Emprendimiento</h2>
                <p><strong>Nombre:</strong> {{ $entrepreneurship->etp_name }}</p>
                <p><strong>Teléfono:</strong> {{ $entrepreneurship->etp_num }}</p>
                <p><strong>Email:</strong> {{ $entrepreneurship->etp_email }}</p>
                <p><strong>Descripción:</strong> {{ $entrepreneurship->etp_description ?? 'Sin descripción' }}</p>
            </div>
        </div>

        <!-- Product and Service Grid Section -->
        <div class="product-section">
            <h2 class="text-center mb-4">Nuestros Productos y Servicios</h2>
            <div class="product-grid">
            @foreach ($products as $product)
            <div class="product-container">
                <div class="product-card">
                <img src="{{ $product->pdt_img ? asset($product->pdt_img) : 'https://via.placeholder.com/300x250' }}" alt="{{ $product->pdt_name }}">
                <span class="badge bg-primary text-white position-absolute top-0 start-0 m-2">Producto</span>
                <a href="{{ route('client.product_details', $product->id_pdt) }}" class="btn-view" style="margin-top: 10px;">Ver más</a>
                <h3>{{ $product->pdt_name }}</h3>
                <p>{{ $product->pdt_description }}</p>
                <div class="price">${{ number_format($product->pdt_price, 2) }}</div>
                </div>
            </div>
            @endforeach

            @foreach ($services as $service)
            <div class="service-container">
                <div class="product-card">
                <img src="{{ $service->srv_img ? asset($service->srv_img) : 'https://via.placeholder.com/300x250' }}" alt="{{ $service->srv_name }}">
                <span class="badge bg-success text-white position-absolute top-0 start-0 m-2">Servicio</span>
                <h3>{{ $service->srv_name }}</h3>
                <p>{{ $service->srv_description }}</p>
                <div class="price">${{ number_format($service->srv_price, 2) }}</div>
                <a href="{{ route('client.service_details', $service->id_srv) }}" class="btn-view" style="margin-top: 10px;">Ver más</a>
                </div>
            </div>
            @endforeach
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    </body>
    </html>
</x-app-layout>
<x-footer-client />
