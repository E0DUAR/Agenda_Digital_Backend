<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: application/json');

require("../conexion.php");
$con = retornarConexion();

$registros = mysqli_query($con, "select id,email, password,rol,estado from usuarios");
$vec=array();
while ($reg = mysqli_fetch_object($registros)) {
    $vec[] = $reg;
}

$cad = json_encode($vec);
echo $cad;
