<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $curso_id = $_POST['curso_id'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];

    try {
        // Intentar registrar al usuario
        $stmt = $conexion->prepare("INSERT INTO inscripciones (curso_id, nombre_completo, correo, telefono) VALUES (?, ?, ?, ?)");
        $stmt->execute([$curso_id, $nombre, $correo, $telefono]);

        // Reducir el cupo del curso
        $stmt = $conexion->prepare("UPDATE cursos SET cupo = cupo - 1 WHERE id = ?");
        $stmt->execute([$curso_id]);

        // Redirigir a la confirmación
        header('Location: confirmacion.php');
        exit;
    } catch (PDOException $e) {
        // Verificar si el error es por duplicado
        if ($e->errorInfo[1] == 1062) {
            header('Location: error.php?error=duplicado');
            exit;
        } else {
            die('Error: ' . $e->getMessage());
        }
    }
}
