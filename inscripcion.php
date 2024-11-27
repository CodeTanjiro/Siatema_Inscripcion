<?php include 'conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripción</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <h1>Formulario de Inscripción</h1>
    </header>
    <main>
        <form action="procesar_inscripcion.php" method="POST">
            <input type="hidden" name="curso_id" value="<?php echo $_GET['curso_id']; ?>">
            <label for="nombre">Nombre completo:</label>
            <input type="text" id="nombre" name="nombre" required>
            <label for="correo">Correo electrónico:</label>
            <input type="email" id="correo" name="correo" required>
            <label for="telefono">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono">
            <button type="submit">Inscribirse</button>
        </form>
    </main>
</body>

</html>