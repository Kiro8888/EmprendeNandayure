<x-app-layout>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $entrepreneurship->etp_name }} - Detalles</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                background-color: #f4f4f4;
                font-family: 'Roboto', sans-serif;
            }

            .hero {
                background: linear-gradient(to bottom right, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.5)), url('/client/hero-products.jpg') no-repeat center center/cover;
                height: 400px;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #fff;
                text-align: center;
                position: relative;
            }

            .hero-content h1 {
                font-size: 3.5rem;
                font-weight: bold;
                color: #28a745;
                margin: 0;
                text-transform: uppercase;
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            }

            .hero-content p {
                font-size: 1.3rem;
                color: #f1f1f1;
            }

            .container-details {
                background-color: white;
                padding: 30px;
                border-radius: 12px;
                box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
                margin-bottom: 40px;
                display: flex;
                gap: 30px;
                align-items: center;
                flex-wrap: wrap;
                transition: transform 0.3s ease;
                max-width: 1200px;
                margin: 0 auto;
            }

            .container-details:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            }

            .container-details img {
                width: 180px;
                height: 180px;
                object-fit: cover;
                border-radius: 50%;
                border: 4px solid #ddd;
                margin-bottom: 20px;
            }

            .container-details div {
                flex-grow: 1;
                padding: 10px;
            }

            .container-details h2 {
                font-size: 2.5rem;
                color: #333;
                margin-bottom: 20px;
            }

            .container-details p {
                font-size: 1.1rem;
                color: #555;
                line-height: 1.6;
            }

            .btn-contact {
                background-color: #007bff;
                color: white;
                padding: 12px 20px;
                border-radius: 50px;
                text-decoration: none;
                font-weight: bold;
                text-align: center;
                display: inline-block;
                margin-top: 20px;
                transition: background-color 0.3s ease;
            }

            .btn-contact:hover {
                background-color: #0056b3;
            }

            /* Product Section Styles */
            .product-section {
                margin-top: 60px;
                padding: 20px 0;
                background-color: #ffffff;
                border-radius: 12px;
                box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
            }

            .product-grid {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
                gap: 30px;
            }

            .product-card {
                background-color: #fff;
                border-radius: 12px;
                padding: 15px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                text-align: center;
                position: relative;
                height: 350px;
            }

            .product-card img {
                width: 100%;
                height: 180px;
                object-fit: cover;
                border-radius: 12px;
                margin-bottom: 15px;
                position: relative;
            }

            .product-card h3 {
                font-size: 1.2rem;
                color: #333;
                margin-bottom: 10px;
            }

            .product-card p {
                font-size: 0.9rem;
                color: #777;
                margin-bottom: 10px;
            }

            .product-card .price {
                font-size: 1.1rem;
                font-weight: bold;
                color: #28a745;
            }

            .product-card .btn-view {
                position: absolute;
                bottom: 20px;
                left: 50%;
                transform: translateX(-50%);
                background-color: #28a745;
                color: white;
                padding: 10px 20px;
                border-radius: 50px;
                text-decoration: none;
                font-weight: bold;
                transition: background-color 0.3s ease;
            }

            .product-card .btn-view:hover {
                background-color: #218838;
            }

            /* Footer Styles */
            .footer {
                background-color: #343a40;
                color: white;
                padding: 30px;
                text-align: center;
                margin-top: 60px;
                border-radius: 10px;
            }

            .footer a {
                color: #28a745;
                text-decoration: none;
                font-weight: bold;
            }

            .footer a:hover {
                text-decoration: underline;
            }

        </style>
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
                    <div class="product-card">
                        <img src="{{ $product->pdt_img ? asset($product->pdt_img) : 'https://via.placeholder.com/300x250' }}" alt="{{ $product->pdt_name }}">
                        <h3>{{ $product->pdt_name }}</h3>
                        <p>{{ $product->pdt_description }}</p>
                        <div class="price">${{ number_format($product->pdt_price, 2) }}</div>
                        <a href="{{ route('client.product_details', $product->id_pdt) }}" class="btn-view">Ver más</a>
                    </div>
                @endforeach

                @foreach ($services as $service)
                    <div class="product-card">
                        <img src="{{ $service->srv_img ? asset($service->srv_img) : 'https://via.placeholder.com/300x250' }}" alt="{{ $service->srv_name }}">
                        <h3>{{ $service->srv_name }}</h3>
                        <p>{{ $service->srv_description }}</p>
                        <div class="price">${{ number_format($service->srv_price, 2) }}</div>
                        <a href="{{ route('client.service_details', $service->id_srv) }}" class="btn-view">Ver más</a>
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
