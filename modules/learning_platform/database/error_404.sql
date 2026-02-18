CREATE DATABASE IF NOT EXISTS sistema_escolar;
USE sistema_escolar;

-- ===============================
-- TABLA ROLES
-- ===============================
CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(20) UNIQUE
);

INSERT INTO roles (nombre) VALUES
('admin'),
('docente'),
('estudiante');

-- ===============================
-- TABLA USUARIOS
-- ===============================
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    rol_id INT,
    usuario VARCHAR(50) UNIQUE,
    password VARCHAR(255),
    dni VARCHAR(8) UNIQUE,
    nombres VARCHAR(100),
    apellidos VARCHAR(100),
    correo VARCHAR(100),
    celular VARCHAR(9),
    foto VARCHAR(150),
    estado TINYINT(1) DEFAULT 1,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (rol_id) REFERENCES roles(id)
);

-- ===============================
-- TABLA GRADOS
-- ===============================
CREATE TABLE grados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_grado VARCHAR(10),
    seccion CHAR(1),
    estado TINYINT(1) DEFAULT 1
);

-- ===============================
-- TABLA ESTUDIANTES
-- ===============================
CREATE TABLE estudiantes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    grado_id INT,
    fecha_ingreso DATE,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (grado_id) REFERENCES grados(id)
);

-- ===============================
-- TABLA DOCENTES
-- ===============================
CREATE TABLE docentes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    profesion VARCHAR(100),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

-- ===============================
-- TABLA CURSOS
-- ===============================
CREATE TABLE cursos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    descripcion TEXT,
    estado TINYINT(1) DEFAULT 1
);

-- ===============================
-- TABLA CURSO-GRADO-DOCENTE
-- ===============================
CREATE TABLE curso_grado_docente (
    id INT AUTO_INCREMENT PRIMARY KEY,
    curso_id INT,
    grado_id INT,
    docente_id INT,
    FOREIGN KEY (curso_id) REFERENCES cursos(id),
    FOREIGN KEY (grado_id) REFERENCES grados(id),
    FOREIGN KEY (docente_id) REFERENCES docentes(id)
);

-- ===============================
-- TABLA MATERIALES
-- ===============================
CREATE TABLE materiales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    curso_grado_docente_id INT,
    titulo VARCHAR(150),
    descripcion TEXT,
    archivo VARCHAR(150),
    fecha_publicacion DATE,
    estado TINYINT(1) DEFAULT 1,
    FOREIGN KEY (curso_grado_docente_id) REFERENCES curso_grado_docente(id)
);

-- ===============================
-- TABLA ACTIVIDADES
-- ===============================
CREATE TABLE actividades (
    id INT AUTO_INCREMENT PRIMARY KEY,
    curso_grado_docente_id INT,
    titulo VARCHAR(150),
    descripcion TEXT,
    archivo VARCHAR(150),
    fecha_publicacion DATE,
    fecha_entrega DATE,
    estado TINYINT(1) DEFAULT 1,
    FOREIGN KEY (curso_grado_docente_id) REFERENCES curso_grado_docente(id)
);

-- ===============================
-- TABLA ASISTENCIA
-- ===============================
CREATE TABLE asistencia (
    id INT AUTO_INCREMENT PRIMARY KEY,
    estudiante_id INT,
    curso_grado_docente_id INT,
    fecha DATE,
    estado CHAR(1),
    comentario TEXT,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (estudiante_id) REFERENCES estudiantes(id),
    FOREIGN KEY (curso_grado_docente_id) REFERENCES curso_grado_docente(id)
);

-- ===============================
-- TABLA TIPOS DE CALIFICACION
-- ===============================
CREATE TABLE tipos_calificacion (
    id INT AUTO_INCREMENT PRIMARY KEY,
    curso_id INT,
    nombre VARCHAR(100),
    valor_maximo INT,
    estado TINYINT(1) DEFAULT 1,
    FOREIGN KEY (curso_id) REFERENCES cursos(id)
);

-- ===============================
-- TABLA CALIFICACIONES
-- ===============================
CREATE TABLE calificaciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    estudiante_id INT,
    curso_grado_docente_id INT,
    tipo_calificacion_id INT,
    fecha DATE,
    nota CHAR(2),
    valor_numerico INT,
    observacion TEXT,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_modificacion TIMESTAMP NULL,
    FOREIGN KEY (estudiante_id) REFERENCES estudiantes(id),
    FOREIGN KEY (curso_grado_docente_id) REFERENCES curso_grado_docente(id),
    FOREIGN KEY (tipo_calificacion_id) REFERENCES tipos_calificacion(id)
);

-- ===============================
-- TABLA DOCUMENTOS
-- ===============================
CREATE TABLE documentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    titulo VARCHAR(150),
    archivo VARCHAR(150),
    descripcion TEXT,
    tipo_destino VARCHAR(20),
    fecha_publicacion DATE,
    estado TINYINT(1) DEFAULT 1,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

-- ===============================
-- TABLA LIBROS
-- ===============================
CREATE TABLE libros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    curso_grado_docente_id INT,
    titulo VARCHAR(150),
    descripcion TEXT,
    modo ENUM('editor','pdf') DEFAULT 'editor',
    archivo_pdf VARCHAR(150),

    -- PDFs de diseño (fondo)
    pdf_encabezado VARCHAR(150),
    pdf_pie_pagina VARCHAR(150),

    estado TINYINT(1) DEFAULT 1,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (curso_grado_docente_id) REFERENCES curso_grado_docente(id)
);

-- ===============================
-- TABLA CONTENIDO DEL LIBRO
-- ===============================
CREATE TABLE libro_contenido (
    id INT AUTO_INCREMENT PRIMARY KEY,
    libro_id INT,
    titulo VARCHAR(150),
    contenido_texto TEXT,
    archivo VARCHAR(150),
    tipo_recurso VARCHAR(20),
    orden INT,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (libro_id) REFERENCES libros(id)
);
