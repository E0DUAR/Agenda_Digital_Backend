<?php
require("conexion.php");
$link = retornarConexion();

if (mysqli_query($link, "CREATE TABLE horarios (
    iddocente int NOT NULL,
    dia varchar(255) NOT NULL,
    hora varchar(10) NOT NULL
) ") === TRUE) {
    printf("Tabla horarios creada.\n");
}

if (mysqli_query($link, "CREATE TABLE docentes (
    id int NOT NULL AUTO_INCREMENT,
    nombre varchar(255) NOT NULL,
    nacimiento varchar(10) NOT NULL,
    tipodocumento varchar(2) NOT NULL,
    identificacion varchar(20) NOT NULL,
    email varchar(255) NOT NULL,
    telefono varchar(20) NOT NULL,
    sexo varchar(1) NOT NULL,
    curso varchar(10) NOT NULL,
    grupo varchar(1) NOT NULL,
    periodo varchar(4) NOT NULL,
    estado varchar(1) NOT NULL,
    PRIMARY KEY(id)
) ") === TRUE) {
    printf("Tabla docentes creada.\n");
}

if (mysqli_query($link, "CREATE TABLE actividades (
        id int NOT NULL AUTO_INCREMENT,
        titulo varchar(255),
        descripcion varchar(255),
        fecha varchar(10),
        estado varchar(1),
        PRIMARY KEY(id)
    ) ") === TRUE) {
    printf("Tabla actividades creada.\n");
}

if (mysqli_query($link, "CREATE TABLE anotaciones (
        id int NOT NULL AUTO_INCREMENT,
        idestudiante int NOT NULL,
        titulo varchar(255),
        descripcion varchar(255),
        fecha varchar(10),
        estado varchar(1),
        PRIMARY KEY(id)
    ) ") === TRUE) {
    printf("Tabla anotaciones creada.\n");
}

if (mysqli_query($link, "CREATE TABLE acudientes (
        id int NOT NULL AUTO_INCREMENT,
        idestudiante int NOT NULL,
        nombre varchar(255),
        nacimiento varchar(10),
        tipodocumento varchar(2),
        identificacion varchar(20),
        email varchar(255),
        telefono varchar(13),
        sexo varchar(1),
        estado varchar(1),
        PRIMARY KEY(id)
    ) ") === TRUE) {
    printf("Tabla acudientes creada.\n");
}

if (mysqli_query($link, "CREATE TABLE estudiantes (
        id int NOT NULL AUTO_INCREMENT,
        nombre varchar(255) NOT NULL,
        acudiente varchar(255),
        periodo varchar(4),
        tipodocumento varchar(2),
        identificacion varchar(20),
        telefono varchar(13),
        sexo varchar(1),
        curso varchar(10),
        grupo varchar(1),
        estado varchar(1),
        nacimiento varchar(10),
        PRIMARY KEY(id)
    ) ") === TRUE) {
    printf("Tabla estudiante creada.\n");
}



if (mysqli_query($link, "CREATE TABLE usuarios (
        id int NOT NULL AUTO_INCREMENT,
        email varchar(255) NOT NULL,
        password varchar(255) NOT NULL,
        rol varchar(15) NOT NULL,
        estado varchar(1),
        PRIMARY KEY(id),
        UNIQUE (email)
    ) ") === TRUE) {
    printf("Tabla usuarios creada.\n");
    mysqli_query($link, "INSERT INTO usuarios (email,password,rol,estado) 
        VALUES ('admin@porvenir.com',SHA1('administrador'),'administrador','A')");

}
