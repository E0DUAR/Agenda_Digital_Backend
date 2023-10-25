<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: application/json');

require("../conexion.php");
$con = retornarConexion();
$query = "select * from acudientes";

$result = mysqli_query($con, $query);

$data = array();
while ($row = mysqli_fetch_object($result)) {
    $data[] = $row;
}

echo json_encode($data);
?>
