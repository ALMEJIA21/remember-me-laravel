<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remember Me - Salud y Control</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f8fafc; font-family: 'Segoe UI', system-ui, sans-serif; color: #334155; }
        .navbar { background: #ffffff; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
        .btn-primary { background-color: #0d9488; border: none; border-radius: 8px; font-weight: 600; }
        .btn-primary:hover { background-color: #0f766e; }
    </style>
</head>
<body>
    <!-- Navbar Superior Pública -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top px-4">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold text-teal" href="#" style="color: #0d9488;">
                <i class="fas fa-capsules me-2"></i>Remember Me
            </a>
            <div class="ms-auto">
               <a href="{{ route('login') }}" class="btn btn-primary px-4">Iniciar Sesión</a>
            </div>
        </div>
    </nav>

    <!-- Contenido de la Página Principal -->
    <main style="margin-top: 80px;">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="text-center py-4 text-muted bg-dark text-white mt-5">
        <small>&copy; 2026 Remember Me - Proyecto SENA</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>