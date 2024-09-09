<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $entrepreneurship->etp_name }} - Detalles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .entrepreneurship-detail img {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ $entrepreneurship->etp_img ? asset($entrepreneurship->etp_img) : 'https://via.placeholder.com/500x300' }}" alt="{{ $entrepreneurship->etp_name }}">
            </div>
            <div class="col-md-6">
                <h1>{{ $entrepreneurship->etp_name }}</h1>
                <p>{{ $entrepreneurship->etp_description }}</p>
                <p><strong>Ubicación:</strong> {{ $entrepreneurship->etp_location }}</p>
                <p><strong>Contacto:</strong> {{ $entrepreneurship->etp_contact }}</p>
                <a href="{{ route('home') }}" class="btn btn-primary">Volver a Inicio</a>
            </div>
        </div>
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
