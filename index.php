<?php include 'conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Cursos</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <h1>Cursos Disponibles</h1>
    </header>
    <main>
        <section>
            <?php
            $stmt = $conexion->query("SELECT * FROM cursos WHERE cupo > 0");
            while ($curso = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='curso'>";
                echo "<h2>{$curso['nombre']}</h2>";
                echo "<p>{$curso['descripcion']}</p>";
                echo "<p>Fecha: {$curso['fecha_inicio']} - {$curso['fecha_fin']}</p>";
                echo "<p>Cupo disponible: {$curso['cupo']}</p>";
                echo "<a href='inscripcion.php?curso_id={$curso['id']}'>Inscribirse</a>";
                echo "</div>";
            }
            ?>
        </section>
    </main>
</body>

</html>