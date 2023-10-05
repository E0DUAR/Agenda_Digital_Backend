<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require("../conexion.php");
    $con = retornarConexion();

    $json = file_get_contents('php://input');
    $params = json_decode($json);

    $result = mysqli_query($con, "select id, email, password, rol, estado 
        from usuarios 
        where email = '$params->email' 
        and password = '$params->password' 
        and estado = 'A'");
    $data = mysqli_fetch_object($result);

    echo json_encode($data);
}
?>