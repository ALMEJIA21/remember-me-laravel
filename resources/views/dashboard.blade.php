<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Remember Me</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<div class="container">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <h2>💊 Remember Me</h2>

        <ul>
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="fa-solid fa-house"></i> Inicio
                </a>
            </li>
            <li>
                <a href="{{ route('usuario') }}">
                    <i class="fa-solid fa-user"></i> Usuario
                </a>
            </li>
            <li>
                <a href="{{ route('tratamiento') }}">
                    <i class="fa-solid fa-notes-medical"></i> Tratamiento
                </a>
            </li>
            <li>
                <a href="{{ route('medicamentos') }}">
                    <i class="fa-solid fa-capsules"></i> Medicamentos
                </a>
            </li>
            <li>
                <a href="{{ route('recordatorios') }}">
                    <i class="fa-solid fa-bell"></i> Recordatorios
                </a>
            </li>
            <li>
                <a href="{{ route('seguimiento') }}">
                    <i class="fa-solid fa-chart-line"></i> Seguimiento
                </a>
            </li>
            <li>
                <a href="{{ route('inicio') }}">
                    <i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión
                </a>
            </li>
        </ul>
    </aside>

    <!-- CONTENIDO PRINCIPAL -->
    <main class="main-content">

        <header>
            <h1>Bienvenido, Usuario 👋</h1>
            <p>Gestiona tus tratamientos de forma sencilla.</p>
        </header>

        <!-- TARJETAS -->
        <section class="cards">
            <div class="card">
                <h3><i class="fa-solid fa-capsules"></i> Medicamentos</h3>
                <p>5</p>
            </div>

            <div class="card">
                <h3><i class="fa-solid fa-clock"></i> Próxima Dosis</h3>
                <p>08:00 PM</p>
            </div>

            <div class="card">
                <h3><i class="fa-solid fa-calendar-days"></i> Tratamientos</h3>
                <p>3</p>
            </div>
        </section>

        <!-- TABLA -->
        <section class="table-section">
            <h2>Próximos Recordatorios</h2>

            <table>
                <thead>
                    <tr>
                        <th>Medicamento</th>
                        <th>Hora</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Paracetamol</td>
                        <td>08:00 PM</td>
                        <td class="pendiente">Pendiente</td>
                    </tr>
                    <tr>
                        <td>Ibuprofeno</td>
                        <td>10:00 PM</td>
                        <td class="pendiente">Pendiente</td>
                    </tr>
                    <tr>
                        <td>Vitamina C</td>
                        <td>07:00 AM</td>
                        <td class="completado">Tomado</td>
                    </tr>
                </tbody>
            </table>
        </section>

    </main>

</div>

</body>
</html>