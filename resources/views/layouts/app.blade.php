<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Remember Me')</title>

    <!-- CSS del Dashboard y Formularios -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/formularios.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- SweetAlert2 para Notificaciones Visuales Elegantes -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Estilos limpios y profesionales -->
    <style>
        :root {
            --primary: #0d9488;
            --primary-dark: #0f766e;
            --bg-main: #f8fafc;
            --text-main: #334155;
            --border-color: #e2e8f0;
        }
        body {
            background-color: var(--bg-main);
            color: var(--text-main);
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }
        .sidebar {
            background: linear-gradient(180deg, #0f172a 0%, #1e293b 100%) !important;
            box-shadow: 4px 0 15px rgba(0,0,0,0.05);
        }
        .sidebar h2 {
            color: #2dd4bf;
            font-size: 1.25rem;
            letter-spacing: 0.5px;
        }
        .sidebar ul li a {
            transition: all 0.25s ease;
            border-radius: 8px;
            margin: 4px 12px;
        }
        .sidebar ul li a:hover, .sidebar ul li a.active {
            background-color: rgba(45, 212, 191, 0.1) !important;
            color: #2dd4bf !important;
            transform: translateX(4px);
        }
        .card, .formulario, .table-section {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 20px -2px rgba(0, 0, 0, 0.05);
            border: 1px solid var(--border-color);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.08);
        }
        .btn, .btn-login {
            background-color: var(--primary) !important;
            border-radius: 8px !important;
            font-weight: 600;
            letter-spacing: 0.3px;
            transition: background-color 0.2s ease, transform 0.1s ease;
        }
        .btn:hover, .btn-login:hover {
            background-color: var(--primary-dark) !important;
        }
        table th {
            background-color: #f1f5f9;
            color: #475569;
            font-weight: 600;
        }
        .pendiente {
            background-color: #fef3c7;
            color: #d97706;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }
        .completado {
            background-color: #d1fae5;
            color: #059669;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- SIDEBAR COMPARTIDO -->
    <aside class="sidebar">
        <h2>💊 Remember Me</h2>
        <ul>
            <li><a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}"><i class="fa-solid fa-house"></i> Inicio</a></li>
            @if(auth()->user()->role === 'cuidador')
                <li><a href="{{ route('cuidador.pacientes') }}" class="{{ request()->routeIs('cuidador.pacientes') ? 'active' : '' }}"><i class="fa-solid fa-people-group"></i> Mis Pacientes</a></li>
            @endif
            @if(auth()->user()->role === 'administrador')
                <li><a href="{{ route('admin.usuarios') }}" class="{{ request()->routeIs('admin.usuarios') ? 'active' : '' }}"><i class="fa-solid fa-user-shield"></i> Administración</a></li>
            @endif
            <li><a href="{{ route('usuario') }}" class="{{ request()->routeIs('usuario') ? 'active' : '' }}"><i class="fa-solid fa-user"></i> Usuario</a></li>
            <li><a href="{{ route('tratamiento') }}" class="{{ request()->routeIs('tratamiento') ? 'active' : '' }}"><i class="fa-solid fa-notes-medical"></i> Tratamiento</a></li>
            <li><a href="{{ route('medicamentos') }}" class="{{ request()->routeIs('medicamentos') ? 'active' : '' }}"><i class="fa-solid fa-capsules"></i> Medicamentos</a></li>
            <li><a href="{{ route('recordatorios') }}" class="{{ request()->routeIs('recordatorios') ? 'active' : '' }}"><i class="fa-solid fa-bell"></i> Recordatorios</a></li>
            <li><a href="{{ route('seguimiento') }}" class="{{ request()->routeIs('seguimiento') ? 'active' : '' }}"><i class="fa-solid fa-chart-line"></i> Seguimiento</a></li>
            <li><a href="{{ route('farmacias') }}" class="{{ request()->routeIs('farmacias') ? 'active' : '' }}"><i class="fa-solid fa-map-location-dot"></i> Farmacias</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST" style="margin:0;">
                    @csrf
                    <button type="submit" style="all:unset; cursor:pointer; display:flex; align-items:center; gap:8px; width:100%; padding:inherit;">
                        <i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión
                    </button>
                </form>
            </li>
        </ul>
    </aside>

    <!-- CONTENIDO DINÁMICO -->
    <main class="main-content">
        
        <!-- ALERTA VISUAL AUTOMÁTICA CON SWEETALERT2 -->
        @if(session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    Swal.fire({
                        icon: 'success',
                        title: '¡Excelente!',
                        text: '{{ session('success') }}',
                        confirmButtonColor: '#0d9488',
                        timer: 3500,
                        timerProgressBar: true
                    });
                });
            </script>
        @endif

        @yield('content')
    </main>
</div>

</body>
</html>