<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $entrepreneurship->etp_name }} - Detalles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero-image {
            height: 400px;
            object-fit: cover;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 mb-4">
                <!-- Imagen del emprendimiento -->
                <img src="{{ $entrepreneurship->etp_img ? asset($entrepreneurship->etp_img) : 'https://via.placeholder.com/1200x400' }}" class="hero-image" alt="{{ $entrepreneurship->etp_name }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <h1>{{ $entrepreneurship->etp_name }}</h1>
                <p><strong>Latitud:</strong> {{ $entrepreneurship->etp_latitude }}</p>
                <p><strong>Longitud:</strong> {{ $entrepreneurship->etp_longitude }}</p>
                <p><strong>Status:</strong> {{ $entrepreneurship->etp_status }}</p>
                <p><strong>Teléfono:</strong> {{ $entrepreneurship->etp_num }}</p>
                <p><strong>Email:</strong> {{ $entrepreneurship->etp_email }}</p>
            </div>
        </div>
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
