<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require("../conexion.php");
    $link = retornarConexion();

    $json = file_get_contents('php://input');
    $params = json_decode($json);

    mysqli_query($link, "UPDATE actividades SET
            titulo = '$params->titulo',
            descripcion = '$params->descripcion',
            fecha = '$params->fecha',
            estado = '$params->estado'
            WHERE id = $_GET[id]
        ");


    echo json_encode(array('result' => 'OK'));
}
