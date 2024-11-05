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
                background-color: #f7f7f7;
                color: #333;
            }

            .hero-title {
                background-color: #6C757D;
                color: #fff;
                padding: 20px;
                text-align: center;
                border-radius: 5px;
                margin-top: 20px;
                font-size: 2rem;
                font-weight: 600;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            }

            .details-card {
                background-color: #ffffff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
                margin-top: 30px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                transition: transform 0.2s ease;
            }

            .details-card:hover {
                transform: scale(1.02);
            }

            .details-info {
                flex: 1;
                padding-right: 20px;
            }

            .details-info h1 {
                font-size: 2rem;
                font-weight: bold;
                color: #495057;
                text-align: center;
                margin-bottom: 20px;
            }

            .details-info p {
                margin-bottom: 15px;
                font-size: 1.1rem;
            }

            .detail-icon {
                margin-right: 10px;
                color: #6C757D;
            }

            .details-image {
                flex: 1;
                text-align: right;
                overflow: hidden;
            }

            .details-image .image-container {
                position: relative;
                max-width: 400px;
                height: 200px;
                border: 5px solid #e0e0e0;
                border-radius: 10px;
                box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
                overflow: hidden;
            }

            .details-image img {
                width: 100%;
                height: auto;
                object-fit: cover;
                border-radius: 10px;
            }

            .section-title {
                background-color: #495057;
                color: #fff;
                padding: 15px;
                text-align: center;
                border-radius: 5px;
                margin-bottom: 20px;
                font-weight: 500;
                font-size: 1.5rem;
            }

            .product-card {
                background-color: #fff;
                border-radius: 8px;
                padding: 15px;
                text-align: center;
                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
                border: 2px solid #e0e0e0;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                width: 80%;
                margin: 0 auto;
            }

            .product-card:hover {
                transform: scale(1.05);
                box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.15);
                border-color: #6C757D;
            }

            .product-card img {
                width: 100%;
                height: 150px;
                object-fit: cover;
                border-radius: 8px;
                margin-bottom: 10px;
            }

            .product-card h4 {
                font-size: 1.2rem;
                font-weight: bold;
                color: #333;
                margin-top: 10px;
            }

            .product-card p {
                font-size: 0.9rem;
                color: #666;
            }

            .btn-contact {
                background-color: #6C757D;
                color: #fff;
                padding: 10px 20px;
                border-radius: 5px;
                text-align: center;
                display: inline-block;
                transition: background-color 0.2s ease;
            }

            .btn-contact:hover {
                background-color: #495057;
                color: #fff;
                text-decoration: none;
            }
        </style>
    </head>
    <body>

    <div class="hero-title">
        <h1>Detalles de Emprendimiento</h1>
    </div>

    <div class="container mt-5">
        <div class="row details-card">
            <div class="col-md-6 details-info">
                <h1>{{ $entrepreneurship->etp_name }}</h1>
                <p><i class="bi bi-shop-window detail-icon"></i> Somos el emprendimiento <strong>{{ $entrepreneurship->etp_name }}</strong>.</p>
                <p><i class="bi bi-geo-alt-fill detail-icon"></i> Nos ubicamos en: <strong>({{ $entrepreneurship->etp_latitude }}, {{ $entrepreneurship->etp_longitude }})</strong>.</p>
                <p><i class="bi bi-telephone-fill detail-icon"></i> Nos puedes contactar al número <strong>{{ $entrepreneurship->etp_num }}</strong>.</p>
                <p><i class="bi bi-envelope-fill detail-icon"></i> Al correo <strong>{{ $entrepreneurship->etp_email }}</strong>.</p>
            </div>

            <div class="col-md-6 details-image">
                <div class="image-container">
                    <img src="{{ $entrepreneurship->etp_img ? asset($entrepreneurship->etp_img) : 'https://via.placeholder.com/400x400' }}" alt="{{ $entrepreneurship->etp_name }}">
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <div class="section-title">
                <h3>Productos del Emprendimiento</h3>
            </div>
        </div>

        <!-- Repeat product cards -->
        <div class="col-md-4 mb-4">
            <div class="product-card">
                <img src="/images/productsdetails/producto1.jpeg" alt="Producto 1">
                <h4>Mangos</h4>
                <p>Mango X - Mangos frescos de alta calidad.</p>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="product-card">
                <img src="/images/productsdetails/producto2.jpeg" alt="Producto 2">
                <h4>Cucumber</h4>
                <p>Pepinos frescos para ensaladas.</p>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="product-card">
                <img src="/images/productsdetails/product3.jpg" alt="Producto 3">
                <h4>Tomatoes</h4>
                <p>Tomates frescos ideales para ensaladas.</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    </body>
    </html>
</x-app-layout>
