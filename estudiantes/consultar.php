<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header('Content-Type: application/json');

    require("../conexion.php");
    $con = retornarConexion();

    $curso = $_GET['curso'];
    $grupo = $_GET['grupo'];
    $estado = $_GET['estado'];

    //$query = "select * from estudiantes where curso='$_GET[curso]'";
    //if($_GET['grupo'] != 'all'){
    //    $query = $query."and grupo='$_GET[grupo]'";
    //}

    /*
    $query = "SELECT * FROM estudiantes WHERE curso = '$curso'";

    if ($grupo !== 'all') {
        $query .= " AND grupo = '$grupo'";
    }

    if ($estado !== 'all') {
        $query .= " AND estado = '$estado'";
    }
    */

    $query = "SELECT * FROM estudiantes WHERE 1 = 1";

    if ($curso !== 'all') {
        $query .= " AND curso = '$curso'";
    }

    if ($grupo !== 'all') {
        $query .= " AND grupo = '$grupo'";
    }

    if ($estado !== 'all') {
        $query .= " AND estado = '$estado'";
    }



    $registros = mysqli_query($con, $query);
    $vec=array();
    while ($reg = mysqli_fetch_object($registros)) {
        $vec[] = $reg;
    }

    echo json_encode($vec);