<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recordatorios - Remember Me</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/formularios.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<div class="container">
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
            <h2>⏰ Recordatorios</h2>

            <form method="POST">
                @csrf
                <label>Medicamento</label>
                <input type="text" name="medicamento" placeholder="Nombre medicamento">

                <label>Hora del recordatorio</label>
                <input type="time" name="hora">

                <label>Días</label>
                <select name="dias">
                    <option>Todos los días</option>
                    <option>Lunes a viernes</option>
                    <option>Personalizado</option>
                </select>

                <div class="notificacion">
                    <label for="activar">Activar notificaciones</label>
                    <input type="checkbox" id="activar" name="notificacion">
                </div>

                <button type="submit" class="btn">Registrar</button>
            </form>

            <?php
            if ($_POST) {
                $medicamento = $_POST["medicamento"];
                $hora = $_POST["hora"];
                $dias = $_POST["dias"];

                if (isset($_POST["notificacion"])) {
                    $notificacion = "Sí";
                } else {
                    $notificacion = "No";
                }

                echo "<hr>";
                echo "<h3>Recordatorio registrado</h3>";
                echo "Medicamento: " . $medicamento . "<br>";
                echo "Hora: " . $hora . "<br>";
                echo "Días: " . $dias . "<br>";
                echo "Notificaciones: " . $notificacion;
            }
            ?>
        </div>
    </main>
</div>

</body>
</html>