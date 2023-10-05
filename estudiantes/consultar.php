<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header('Content-Type: application/json');

    require("../conexion.php");
    $con = retornarConexion();
    $query = "select * from estudiantes where curso='$_GET[curso]'";
    if($_GET['grupo'] != 'all'){
        $query = $query."and grupo='$_GET[grupo]'";
    }
    $registros = mysqli_query($con, $query);
    $vec=array();
    while ($reg = mysqli_fetch_object($registros)) {
        $vec[] = $reg;
    }

    echo json_encode($vec);