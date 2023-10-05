<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require("../conexion.php");
    $link = retornarConexion();

    $json = file_get_contents('php://input');
    $params = json_decode($json, true);

    mysqli_query($link, "delete from horarios 
    where iddocente = $_GET[iddocente] ");

    $query = "INSERT INTO horarios ( iddocente, dia, hora) VALUES ";

    for ($i = 0; $i < count($params); $i++) {
        $obj = $params[$i];
        $query .= "($obj[iddocente], $obj[dia], $obj[hora])";
        if ($i + 1 < count($params)) {
            $query .= ", ";
        }
    }
    mysqli_query($link, $query);

    echo json_encode(array('result' => 'OK'));
}
