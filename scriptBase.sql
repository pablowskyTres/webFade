CREATE DATABASE prueba;

CREATE TABLE `prueba`.`cuenta` ( 
`id_cuenta` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
 `username` VARCHAR(50) NOT NULL ,
 `password` VARCHAR(50) NOT NULL ,
 `email` VARCHAR(50) NOT NULL) ENGINE = InnoDB;

CREATE TABLE `prueba`.`cuenta_permisos` ( 
 `id_cuenta` INT NOT NULL,
 `id_permiso` INT NOT NULL) ENGINE = InnoDB;
 
CREATE TABLE `prueba`.`cliente` ( 
`id_cliente` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
 `nombre` VARCHAR(50) NOT NULL ,
 `apellido_paterno` VARCHAR(50) NOT NULL ,
 `apellido_materno` VARCHAR(50) NOT NULL ,
 `sexo` VARCHAR(50) NOT NULL ,
 `direccion` VARCHAR(50) NOT NULL,
 `id_cuenta` INT NOT NULL) ENGINE = InnoDB;
  
CREATE TABLE `prueba`.`permisos` ( 
`id_permiso` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
 `descripcion` VARCHAR(50) NOT NULL) ENGINE = InnoDB;

CREATE TABLE `prueba`.`producto` ( 
`id_producto` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
 `nombre` VARCHAR(50) NOT NULL ,
 `stock` INT NOT NULL ,
 `descripcion` VARCHAR(255) NOT NULL,
 `activo` INT NOT NULL) ENGINE = InnoDB;
 
INSERT INTO `prueba`.`permisos`(`descripcion`) VALUES('admin');
INSERT INTO `prueba`.`cuenta`(`username`, `password`, `email`) VALUES('admin', 'admin', 'admin@admin.com');
INSERT INTO `prueba`.`permisos`(`descripcion`) VALUES('admin');
INSERT INTO `prueba`.`cuenta_permisos`(`id_cuenta`, `id_permiso`) VALUES(1, 1);