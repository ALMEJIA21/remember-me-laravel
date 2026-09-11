<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remember Me - Cuidado Fácil</title>
    
    <!-- Estilos -->
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<header>
    <nav>
        <h1>💊 Remember Me</h1>
        <ul>
            <li><a href="{{ route('inicio') }}">Inicio</a></li>
            <li><a href="{{ route('usuario') }}">Usuario</a></li>
            <li><a href="{{ route('tratamiento') }}">Tratamiento</a></li>
            <li><a href="{{ route('medicamentos') }}">Medicamentos</a></li>
            <li><a href="{{ route('recordatorios') }}">Recordatorios</a></li>
            <li><a href="{{ route('seguimiento') }}">Seguimiento</a></li>
            <li><a href="{{ route('login') }}" class="btn-nav">Iniciar Sesión</a></li>
        </ul>
    </nav>
</header>

<section class="hero">
    <div class="hero-text">
        <h2>Tu tratamiento médico bajo control</h2>
        <p>
            Remember Me es una aplicación diseñada para ayudar
            a pacientes y cuidadores a gestionar medicamentos,
            recordatorios y tratamientos de forma sencilla,
            segura y organizada.
        </p>
        <a href="{{ route('login') }}" class="btn">Iniciar Sesión</a>
    </div>
</section>

<section class="services">
    <h2>Funciones Principales</h2>
    <div class="cards">
        <div class="card">
            <h3>💊 Medicamentos</h3>
            <p>Administra dosis y tratamientos.</p>
        </div>
        <div class="card">
            <h3>⏰ Recordatorios</h3>
            <p>Notificaciones automáticas.</p>
        </div>
        <div class="card">
            <h3>📊 Historial</h3>
            <p>Consulta tratamientos cumplidos.</p>
        </div>
    </div>
</section>

<footer>
    <p>© 2026 Remember Me - Proyecto SENA</p>
</footer>

</body>
</html>