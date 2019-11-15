-- Crear base de datos --
    CREATE DATABASE if NOT EXISTS DAW202DBdepartamentos;
-- Crear del usuario --
    CREATE USER if not exists 'usuarioDAW202Departamentos'@'%' identified BY 'paso'; 
    
-- Uso de la base de datos. --
    USE DAW202DBdepartamentos;

-- Crear tablas. --
    CREATE TABLE IF NOT EXISTS Departamento(
        CodDepartamento char(3) PRIMARY KEY,
    DescDepartamento varchar(255) NOT null)
    ENGINE=INNODB;

-- Dar permisos al usuario --
    GRANT ALL PRIVILEGES ON DAW202DBdepartamentos.* TO 'usuarioDAW202Departamentos'@'%'; 
    FLUSH PRIVILEGES;