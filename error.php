<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <h1>Error de Inscripción</h1>
    </header>
    <main>
        <?php
        if (isset($_GET['error']) && $_GET['error'] === 'duplicado') {
            echo "<p>Ya estás inscrito en este curso con el correo proporcionado.</p>";
        } else {
            echo "<p>Ocurrió un error inesperado. Por favor, inténtalo de nuevo.</p>";
        }
        ?>
        <a href="index.php">Volver al inicio</a>
    </main>
</body>

</html>