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

        @if ($errors->any())
            <div class="login-error" style="color:#c0392b; margin-bottom:10px;">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login.attempt') }}" method="POST">
            @csrf
            <input type="email" name="email" value="{{ old('email') }}" placeholder="ejemplo@correo.com" required autofocus>
            <input type="password" name="password" placeholder="********" required>

            <label style="display:block; font-size:0.85em; margin:8px 0;">
                <input type="checkbox" name="remember" value="1"> Recordarme
            </label>

            <button type="submit" class="btn-login">Iniciar Sesión</button>
        </form>

        <a href="{{ route('register') }}" class="back" style="display: block; margin-top: 15px; text-decoration: none; color: #2b7a78;">¿No tienes cuenta? Regístrate</a>
        <a href="{{ route('inicio') }}" class="back" style="display: block; margin-top: 8px; text-decoration: none; color: #999; font-size: 0.85em;">← Volver al inicio</a>
    </div>
</div>

</body>
</html>
