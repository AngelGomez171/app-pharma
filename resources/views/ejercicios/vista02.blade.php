<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="{{ asset('css/vista02.css') }}">
</head>
<body>
    <div class="container">
        <h1>👤 Perfil de Usuario</h1>
        <p><strong>Nombre:</strong> {{ $nombre }}</p>
        <p><strong>Edad:</strong> {{ $edad }} años</p>
    </div>
</body>
</html>
