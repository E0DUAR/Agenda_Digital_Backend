<?php

    

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header('Content-Type: application/json');

    require("../conexion.php");
    $con = retornarConexion();

    $curso = $_GET['curso'];
    $grupo = $_GET['grupo'];
    $estado = $_GET['estado'];
    $acudiente = $_GET['acudiente'];
    

        $query = "SELECT e.* FROM estudiantes e 
        LEFT JOIN acudientes a ON e.id = a.idestudiante
        WHERE 1 = 1";


    if ($curso !== 'all') {
        $query .= " AND curso = '$curso'";
    }

    if ($grupo !== 'all') {
        $query .= " AND grupo = '$grupo'";
    }

    if ($estado !== 'all') {
        $query .= " AND estado = '$estado'";
    }

    if($acudiente !== 'all') {
        $query .= " AND (a.email = '$acudiente' OR a.email IS NULL)";
    }


    $registros = mysqli_query($con, $query);
    
    $vec=array();
    while ($reg = mysqli_fetch_object($registros)) {
        $vec[] = $reg;
    }

    echo json_encode($vec);



    function exportarAExcel($vec) {
        
    }

    if(isset($_POST["export_data"])) {
        exportar($vec);
     } else {
         header('Content-Type: application/json');
         echo json_encode($vec);
     }
