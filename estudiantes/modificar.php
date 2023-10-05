<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header('Content-Type: application/json');
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require("../conexion.php");
        $link = retornarConexion();
        
        $json = file_get_contents('php://input');
        $params = json_decode($json);

        mysqli_query($link, "UPDATE estudiantes SET
            nombre = '$params->nombre',
            acudiente = '$params->acudiente',
            periodo = '$params->periodo',
            tipodocumento = '$params->tipodocumento',
            identificacion = '$params->identificacion',
            telefono = '$params->telefono',
            sexo = '$params->sexo',
            curso = '$params->curso',
            grupo = '$params->grupo',
            estado = '$params->estado',
            nacimiento = '$params->nacimiento'
            WHERE id = $_GET[id]
        ");

        
        echo json_encode(array('result'=>'OK'));

    }