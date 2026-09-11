<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión | Remember Me</title>
    
    <!-- Enlace al archivo CSS en la carpeta public -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<div class="login-container">
    <div class="login-box">
        <h2>💊 Remember Me</h2>
        <p>Controla tus tratamientos de forma segura</p>

        <form action="{{ route('dashboard') }}" method="GET">
            <input type="email" name="correo" placeholder="ejemplo@correo.com" required>
            <input type="password" name="password" placeholder="********" required>
            
            <button type="submit" class="btn-login">Iniciar Sesión</button>
        </form>

        <a href="{{ route('inicio') }}" class="back" style="display: block; margin-top: 15px; text-decoration: none; color: #2b7a78;">← Volver al inicio</a>
    </div>
</div>

</body>
</html>