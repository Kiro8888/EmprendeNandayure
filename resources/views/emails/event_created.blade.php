<!DOCTYPE html>
<html>
<head>
    <title>Nuevo Evento Creado</title>
</head>
<body>
    <h1>{{ $event->evt_name }}</h1>
    <p>{{ $event->evt_description }}</p>
    <p>Fecha: {{ $event->evt_date }} - Hora: {{ $event->evt_hour }}</p>
    <p>Ubicación: {{ $event->evt_location }}</p>
</body>
</html>
