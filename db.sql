CREATE DATABASE refugio;
USE refugio;

-- Inicio De Sesion Y Registro --

DROP TABLE registro;
CREATE TABLE registro (
	id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    nombre VARCHAR (50) NOT NULL,
    apellidos VARCHAR (50) NOT NULL,
    nombreusuario VARCHAR (50) NOT NULL UNIQUE,
    correo VARCHAR (100) NOT NULL,
    fecha DATE NOT NULL,
    contrasena VARCHAR (255) NOT NULL
);

DROP TABLE sesion;
CREATE TABLE sesion (
	id INT AUTO_INCREMENT PRIMARY KEY,
    nombreusuario VARCHAR (50) NOT NULL,
    contrasena VARCHAR (255) NOT NULL,
    FOREIGN KEY (nombreusuario) REFERENCES registro (nombreusuario)
);

DROP TABLE aportaciones;
CREATE TABLE aportaciones (
	id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR (50) NOT NULL,
    apellidos VARCHAR (200) NOT NULL,
    telefono VARCHAR (30) NOT NULL,
    aportacion VARCHAR (60) NOT NULL,
    fecha DATE NOT NULL
);

DROP TABLE citas;
CREATE TABLE citas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    telefono VARCHAR(15) NOT NULL,
    sexo ENUM('Macho', 'Hembra') NOT NULL,
    nombre_mascota VARCHAR(100) NOT NULL,
    Raza VARCHAR(40) NOT NULL,
    Edad VARCHAR (50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


SELECT * FROM citas;

-- Inserccion de datos --

INSERT INTO registro VALUES (NULL, 'Luis Antonio', 'Custodio Guzmán', 'flymxth', 'luis@gmail.com', '03-01-2007', 'Comprando2007');
INSERT INTO registro VALUES (NULL, 'Jose Antonio', 'Duran Torres', 'Juancho0', 'jduran@gmail.com', '2007-01-03', 'Comprando2007');
SELECT * FROM registro;

