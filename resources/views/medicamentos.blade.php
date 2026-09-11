<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Medicamento - Remember Me</title>
    
    <!-- Enlaces a CSS -->
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

    <!-- CONTENIDO PRINCIPAL -->
    <main class="main-content">
        <div class="formulario">

            <h2>💊 Medicamentos</h2>

            <form method="POST">
                <!-- Directiva obligatoria de Laravel para formularios POST -->
                @csrf
                
                <label>Nombre medicamento</label>
                <input type="text" name="nombre" placeholder="Ej: Acetaminofén">

                <label>Dosis</label>
                <input type="text" name="dosis" placeholder="Ej: 500 mg">

                <label>Frecuencia</label>
                <select name="frecuencia">
                    <option>Cada 8 horas</option>
                    <option>Cada 12 horas</option>
                    <option>Una vez al día</option>
                </select>

                <label>Cantidad</label>
                <input type="number" name="cantidad" placeholder="Cantidad">

                <label>Observaciones</label>
                <textarea name="observaciones" placeholder="Notas importantes"></textarea>

                <button type="submit" class="btn">Registrar</button>
            </form>

            <?php
            if ($_POST) {
                $nombre = $_POST["nombre"];
                $dosis = $_POST["dosis"];
                $frecuencia = $_POST["frecuencia"];
                $cantidad = $_POST["cantidad"];
                $observaciones = $_POST["observaciones"];

                echo "<hr>";
                echo "<h3>Medicamento registrado</h3>";
                echo "Nombre: " . $nombre . "<br>";
                echo "Dosis: " . $dosis . "<br>";
                echo "Frecuencia: " . $frecuencia . "<br>";
                echo "Cantidad: " . $cantidad . "<br>";
                echo "Observaciones: " . $observaciones;
            }
            ?>

        </div>
    </main>
</div>

</body>
</html>