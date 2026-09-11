<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tratamientos - Remember Me</title>
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
            <h2>💊 Registrar Tratamiento</h2>

            <form method="POST">
                @csrf
                <label>Nombre del tratamiento</label>
                <input type="text" name="nombre" placeholder="Ej: Tratamiento presión">

                <label>Descripción</label>
                <textarea name="descripcion" placeholder="Descripción del tratamiento"></textarea>

                <label>Fecha inicio</label>
                <input type="date" name="fechaInicio">

                <label>Fecha final</label>
                <input type="date" name="fechaFinal">

                <label>Estado</label>
                <select name="estado">
                    <option>Activo</option>
                    <option>Finalizado</option>
                    <option>Pendiente</option>
                </select>

                <button type="submit" class="btn">Registrar</button>
            </form>

            <?php
            if ($_POST) {
                $nombre = $_POST["nombre"];
                $descripcion = $_POST["descripcion"];
                $fechaInicio = $_POST["fechaInicio"];
                $fechaFinal = $_POST["fechaFinal"];
                $estado = $_POST["estado"];

                echo "<hr>";
                echo "<h3>Tratamiento registrado</h3>";
                echo "Nombre: " . $nombre . "<br>";
                echo "Descripción: " . $descripcion . "<br>";
                echo "Fecha de inicio: " . $fechaInicio . "<br>";
                echo "Fecha final: " . $fechaFinal . "<br>";
                echo "Estado: " . $estado;
            }
            ?>
        </div>
    </main>
</div>

</body>
</html>