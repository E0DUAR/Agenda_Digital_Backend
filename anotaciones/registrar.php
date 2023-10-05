<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require("../conexion.php");
    $link = retornarConexion();

    $json = file_get_contents('php://input');
    $params = json_decode($json);

    mysqli_query($link, "INSERT INTO anotaciones (
        idestudiante,
        titulo,
        descripcion,
        fecha,
        estado,
        idusuario
    ) 
        VALUES (
        '$params->idestudiante',
        '$params->titulo',
        '$params->descripcion',
        '$params->fecha',
        '$params->estado',
        '$params->idusuario'
        )");

    echo json_encode(array('result' => 'OK'));
}
