<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require("../conexion.php");
    $link = retornarConexion();

    $json = file_get_contents('php://input');
    $params = json_decode($json);

    mysqli_query($link, "INSERT INTO estudiantes (
        nombre,
        acudiente,
        periodo,
        tipodocumento,
        identificacion,
        telefono,
        sexo,
        curso,
        grupo,
        estado,
        nacimiento
    ) 
        VALUES (
        '$params->nombre',
        '$params->acudiente',
        '$params->periodo',
        '$params->tipodocumento',
        '$params->identificacion',
        '$params->telefono',
        '$params->sexo',
        '$params->curso',
        '$params->grupo',
        '$params->estado',
        '$params->nacimiento'
        )");

    echo json_encode(array('result' => 'OK'));
}
