<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            color: #4CAF50;
        }
        .content {
            text-align: left;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9em;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>¡El evento "{{ $event->evt_name }}" ha sido actualizado!</h1>
            <p>Detalles del evento actualizado:</p>
        </div>
        <div class="content">
            {{-- <p>Hola {{ $user->name }},</p> --}}
            <p>Nos complace informarte sobre un nuevo evento que hemos organizado:</p>
            <ul>
                <li><strong>Nombre:</strong> {{ $event->evt_name }}</li>
                <li><strong>Descripción:</strong> {{ $event->evt_description }}</li>
                <li><strong>Fecha:</strong> {{ $event->evt_date }}</li>
                <li><strong>Hora:</strong> {{ $event->evt_hour }}</li>
                <li><strong>Lugar:</strong> {{ $event->evt_location }}</li>
            </ul>
            <p>¡Esperamos verte allí!</p>
        </div>
        <div class="footer">
            <p>Gracias por ser parte de Emprende Nandayure.</p>
        </div>
    </div>
</body>
</html>