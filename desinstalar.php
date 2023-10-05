<?php
    require("conexion.php");
    $link = retornarConexion();

    mysqli_query($link, "DROP TABLE horarios");
    mysqli_query($link, "DROP TABLE docentes");
    mysqli_query($link, "DROP TABLE actividades");
    mysqli_query($link, "DROP TABLE anotaciones");
    mysqli_query($link, "DROP TABLE acudientes");
    mysqli_query($link, "DROP TABLE estudiantes");
    mysqli_query($link, "DROP TABLE usuarios");