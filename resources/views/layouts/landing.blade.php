<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remember Me - Salud y Control</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #0d9488;
            --primary-dark: #0f766e;
            --accent: #2dd4bf;
            --navy: #0f172a;
            --navy-soft: #1e293b;
        }
        body {
            background-color: #f8fafc;
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
            color: #334155;
        }
        h1, h2, h3, h4, h5, h6 { font-family: 'Poppins', 'Segoe UI', sans-serif; }

        .navbar { background: rgba(255,255,255,0.9); backdrop-filter: blur(8px); box-shadow: 0 2px 15px rgba(15,23,42,0.06); }
        .btn-primary { background-color: var(--primary); border: none; border-radius: 10px; font-weight: 600; transition: transform .15s ease, box-shadow .15s ease, background-color .15s ease; }
        .btn-primary:hover { background-color: var(--primary-dark); transform: translateY(-2px); box-shadow: 0 8px 20px rgba(13,148,136,0.28); }
        .btn-outline-primary { color: var(--primary); border-color: var(--primary); border-radius: 10px; font-weight: 600; transition: transform .15s ease; }
        .btn-outline-primary:hover { background-color: var(--primary); border-color: var(--primary); transform: translateY(-2px); }

        /* Animación de aparición al hacer scroll */
        .reveal { opacity: 0; transform: translateY(24px); transition: opacity .6s ease, transform .6s ease; }
        .reveal.is-visible { opacity: 1; transform: translateY(0); }

        /* Blobs de fondo decorativos, sutiles */
        .bg-blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(60px);
            opacity: 0.18;
            z-index: 0;
            pointer-events: none;
        }
    </style>
</head>
<body>
    <!-- Navbar Superior Pública -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top px-4">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="{{ route('inicio') }}" style="color: #0d9488;">
                <i class="fas fa-capsules me-2"></i>Remember Me
            </a>
            <div class="ms-auto d-flex gap-2">
                @auth
                    <a href="{{ route('dashboard') }}" class="btn btn-primary px-4">
                        <i class="fas fa-gauge me-1"></i> Ir al Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-primary px-4">Iniciar Sesión</a>
                    <a href="{{ route('register') }}" class="btn btn-primary px-4">
                        <i class="fas fa-user-plus me-1"></i> Registrarse
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Contenido de la Página Principal -->
    <main style="margin-top: 80px;">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="pt-5 pb-4" style="background-color: var(--navy); color: #cbd5e1;">
        <div class="container">
            <div class="row gy-4">
                <div class="col-md-4">
                    <h5 class="fw-bold text-white mb-3"><i class="fas fa-capsules me-2" style="color: var(--accent);"></i>Remember Me</h5>
                    <p class="small text-secondary">Una aplicación pensada para ayudarte a ti y a tus seres queridos a mantener el control de tratamientos médicos, sin olvidar una sola dosis.</p>
                </div>
                <div class="col-md-4">
                    <h6 class="fw-bold text-white mb-3">Enlaces</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="{{ route('login') }}" class="text-secondary text-decoration-none">Iniciar sesión</a></li>
                        <li class="mb-2"><a href="{{ route('register') }}" class="text-secondary text-decoration-none">Crear cuenta</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h6 class="fw-bold text-white mb-3">Proyecto</h6>
                    <p class="small text-secondary">Desarrollado como proyecto formativo del SENA, enfocado en la gestión responsable de la salud.</p>
                </div>
            </div>
            <hr class="border-secondary my-4">
            <div class="text-center small text-secondary">
                &copy; 2026 Remember Me — Proyecto SENA. Todos los derechos reservados.
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Revela secciones con la clase "reveal" a medida que entran en pantalla
        document.addEventListener('DOMContentLoaded', function () {
            const items = document.querySelectorAll('.reveal');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.15 });
            items.forEach(item => observer.observe(item));
        });
    </script>
</body>
</html>