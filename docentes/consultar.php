<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header('Content-Type: application/json');

    require("../conexion.php");
    $con = retornarConexion();
    $query = "select * from docentes ";
    $registros = mysqli_query($con, $query);
    $vec=array();
    while ($reg = mysqli_fetch_object($registros)) {
        $vec[] = $reg;
    }

    echo json_encode($vec);