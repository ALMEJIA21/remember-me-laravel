<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Usuario - Remember Me</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/formularios.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<div class="container">
    <!-- SIDEBAR -->
    <aside class="sidebar">
        <h2>💊 Remember Me</h2>
        <ul>
            <li><a href="{{ route('dashboard') }}"><i class="fa-solid fa-house"></i> Inicio</a></li>
            <li><a href="{{ route('usuario') }}"><i class="fa-solid fa-user"></i> Usuario</a></li>
            <li><a href="{{ route('tratamiento') }}"><i class="fa-solid fa-notes-medical"></i> Tratamiento</a></li>
            <li><a href="{{ route('medicamentos') }}"><i class="fa-solid fa-capsules"></i> Medicamentos</a></li>
            <li><a href="{{ route('recordatorios') }}"><i class="fa-solid fa-bell"></i> Recordatorios</a></li>
            <li><a href="{{ route('seguimiento') }}"><i class="fa-solid fa-chart-line"></i> Seguimiento</a></li>
            <li><a href="{{ route('inicio') }}"><i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión</a></li>
        </ul>
    </aside>

    <main class="main-content">
        <div class="formulario">
            <h2>👤 Información del Usuario</h2>

            <form method="POST">
                @csrf
                <label>Nombre completo</label>
                <input type="text" name="nombre" placeholder="Ingrese nombre">

                <label>Correo electrónico</label>
                <input type="email" name="correo" placeholder="correo@gmail.com">

                <label>Teléfono</label>
                <input type="number" name="telefono" placeholder="Número">

                <label>Fecha nacimiento</label>
                <input type="date" name="fechaNacimiento">

                <label>Tipo de usuario</label>
                <select name="tipoUsuario">
                    <option>Paciente</option>
                    <option>Cuidador</option>
                    <option>Familiar</option>
                </select>

                <button type="submit" class="btn">Registrar</button>
            </form>

            <?php
            if ($_POST) {
                $nombre = $_POST["nombre"];
                $correo = $_POST["correo"];
                $telefono = $_POST["telefono"];
                $fechaNacimiento = $_POST["fechaNacimiento"];
                $tipoUsuario = $_POST["tipoUsuario"];

                echo "<hr>";
                echo "<h3>Usuario registrado</h3>";
                echo "Nombre: " . $nombre . "<br>";
                echo "Correo: " . $correo . "<br>";
                echo "Teléfono: " . $telefono . "<br>";
                echo "Fecha de nacimiento: " . $fechaNacimiento . "<br>";
                echo "Tipo de usuario: " . $tipoUsuario;
            }
            ?>
        </div>
    </main>
</div>

</body>
</html>