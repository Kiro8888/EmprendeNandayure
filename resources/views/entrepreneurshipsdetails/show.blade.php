<x-app-layout>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $entrepreneurship->etp_name }} - Detalles</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            .hero-title {
                background-color: #6C584C; /* Color de fondo del título */
                color: white;
                padding: 20px;
                text-align: center;
                border-radius: 5px;
                margin-top: 20px;
            }
    
            .details-card {
                background-color: #f8f9fa;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
                margin-top: 30px;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
    
            .details-info {
                flex: 1;
                padding-right: 20px;
            }
    
            .details-info h1 {
                font-size: 2rem;
                font-weight: bold;
                color: #2d3748;
                text-align: center; /* Centrando el título del emprendimiento */
            }
    
            .details-info p {
                margin-bottom: 10px;
                font-size: 1.1rem;
            }
    
            .details-info .detail-icon {
                margin-right: 10px;
                color: #6C584C;
            }
    
            .details-image {
                flex: 1;
                text-align: right;
            }
    
            .details-image img {
                width: 100%;
                max-width: 400px;
                height: auto;
                border-radius: 10px;
                object-fit: cover;
                box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            }
    
            .section-title {
                background-color: #6C584C;
                color: white;
                padding: 10px;
                text-align: center;
                border-radius: 5px;
                margin-bottom: 20px;
            }
    
            .product-card img {
                width: 100%;
                height: 200px;
                object-fit: cover;
                border-radius: 10px;
                box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            }
    
            .product-card {
                background-color: #fff;
                border-radius: 10px;
                padding: 15px;
                text-align: center;
                box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
                border: 2px solid #9acd32; /* Borde verde oscuro */
            }
    
            .product-card h4 {
                margin-top: 10px;
                font-size: 1.5rem;
                font-weight: bold;
                color: #9acd32; /* Mismo color verde oscuro que el borde */
            }
    
            .product-card p {
                font-size: 1rem;
                color: #6C584C;
            }
        </style>
    </head>
    <body>
    
    <div class="hero-title">
        <h1>Detalles de Emprendimiento</h1>
    </div>
    
    <div class="container mt-5">
        <!-- Detalles del emprendimiento con imagen -->
        <div class="details-card">
            <!-- Datos del emprendimiento -->
            <div class="details-info">
                <h1 style="color: #9acd32;">{{ $entrepreneurship->etp_name }}</h1> <!-- Nombre del emprendimiento en verde -->
                <p><i class="bi bi-geo-alt-fill detail-icon"></i><strong>Latitud:</strong> {{ $entrepreneurship->etp_latitude }}</p>
                <p><i class="bi bi-geo-alt-fill detail-icon"></i><strong>Longitud:</strong> {{ $entrepreneurship->etp_longitude }}</p>
                <p><i class="bi bi-telephone-fill detail-icon"></i><strong>Teléfono:</strong> {{ $entrepreneurship->etp_num }}</p>
                <p><i class="bi bi-envelope-fill detail-icon"></i><strong>Email:</strong> {{ $entrepreneurship->etp_email }}</p>
            </div>
    
            <!-- Imagen del emprendimiento -->
            <div class="details-image">
                <img src="{{ $entrepreneurship->etp_img ? asset($entrepreneurship->etp_img) : 'https://via.placeholder.com/400x400' }}" alt="{{ $entrepreneurship->etp_name }}">
            </div>
        </div>
    
        <!-- Sección de productos -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="section-title">
                    <h3>Productos del Emprendimiento</h3>
                </div>
            </div>
    
            <!-- Tarjeta de producto 1 -->
            <div class="col-md-6 mb-4">
                <div class="product-card">
                    <img src="/images/productsdetails/producto1.jpeg" alt="Producto 1">
                    <h4>Mangos</h4>
                    <p>Mango X - Mangos frescos de alta calidad.</p>
                </div>
            </div>
    
            <!-- Tarjeta de producto 2 -->
            <div class="col-md-6 mb-4">
                <div class="product-card">
                    <img src="/images/productsdetails/producto2.jpeg" alt="Producto 2">
                    <h4>Cucumber</h4>
                    <p>Cucumber - Pepinos frescos para ensaladas.</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    
    <!-- Iconos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    </body>
    </html>
</x-app-layout>
