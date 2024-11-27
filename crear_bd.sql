CREATE DATABASE sistema_inscripciones CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE sistema_inscripciones;

-- Tabla de cursos
CREATE TABLE cursos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT NOT NULL,
    fecha_inicio DATE NOT NULL,
    fecha_fin DATE NOT NULL,
    cupo INT NOT NULL
);

-- Tabla de inscripciones con restricción para evitar duplicados
CREATE TABLE inscripciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    curso_id INT NOT NULL,
    nombre_completo VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL,
    telefono VARCHAR(15),
    fecha_inscripcion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE (curso_id, correo), -- Evita inscripciones duplicadas al mismo curso
    FOREIGN KEY (curso_id) REFERENCES cursos(id) ON DELETE CASCADE
);

-- Tabla de usuarios para administración
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_usuario VARCHAR(50) UNIQUE NOT NULL,
    clave VARCHAR(255) NOT NULL
);

-- Datos iniciales
INSERT INTO usuarios (nombre_usuario, clave) VALUES ('admin', SHA2('admin123', 256));
INSERT INTO cursos (nombre, descripcion, fecha_inicio, fecha_fin, cupo) VALUES
('Curso de PHP', 'Aprende programación en PHP desde cero.', '2024-12-01', '2024-12-10', 20),
('Introducción a MySQL', 'Gestión de bases de datos con MySQL.', '2024-12-05', '2024-12-15', 15),
('CSS Avanzado', 'Diseño avanzado de interfaces web.', '2024-12-10', '2024-12-20', 10);
