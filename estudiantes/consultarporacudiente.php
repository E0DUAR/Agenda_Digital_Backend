<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header('Content-Type: application/json');

    require("../conexion.php");
    $con = retornarConexion();
    
    $idAcudiente = $_GET['idAcudiente'];
    $curso = $_GET['curso'];
    $grupo = $_GET['grupo'];
    $estado = $_GET['estado'];

    $query = "SELECT * FROM estudiantes WHERE idestudiante = '$idAcudiente'";
    
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