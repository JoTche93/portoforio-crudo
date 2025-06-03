# portoforio-crudo
portafolio con CRUD

para poder usarlo de manera local deberas crear la base de datos y su respectivas tablas con este script

CREATE DATABASE portafolio_db;
USE portafolio_db;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(255) NOT NULL
);

CREATE TABLE proyectos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(100) NOT NULL,
  descripcion TEXT NOT NULL,
  url_github VARCHAR(255),
  url_produccion VARCHAR(255),
  imagen VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Usuario de prueba (usuario: admin, contraseña: 123456)
INSERT INTO users (username, password) VALUES ('admin', MD5('123456'));


USO DE IA:

Chat GPT para correcion de errores o para recibir sugerencias de semantica y codigo css para estilizacion de algunas zonas, como por ejemplo una grilla de como se muestran los proyectos al momento de subirse.
