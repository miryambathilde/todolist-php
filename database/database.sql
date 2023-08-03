CREATE DATABASE todo_list;

USE todo_list;

CREATE TABLE
    Tareas (
        id INT AUTO_INCREMENT PRIMARY KEY,
        titulo VARCHAR(255) NOT NULL,
        descripcion TEXT,
        estado ENUM('pendiente', 'completada') NOT NULL DEFAULT 'pendiente'
    );