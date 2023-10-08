<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require("../conexion.php");
    $link = retornarConexion();

    $json = file_get_contents('php://input');
    $params = json_decode($json);

    mysqli_query($link, "INSERT INTO acudientes (
        idestudiante,
        nombre,
        nacimiento,
        tipodocumento,
        identificacion,
        email,
        telefono,
        sexo,
        estado
    ) 
        VALUES (
        '$params->idestudiante',
        '$params->nombre',
        '$params->nacimiento',
        '$params->tipodocumento',
        '$params->identificacion',
        '$params->email',
        '$params->telefono',
        '$params->sexo',
        '$params->estado'
        )");

    mysqli_query($link, "INSERT INTO usuarios (email,password,rol,estado) 
    VALUES ('$params->email','$params->identificacion','acudiente','A')");


    echo json_encode(array('result' => 'OK'));
}
