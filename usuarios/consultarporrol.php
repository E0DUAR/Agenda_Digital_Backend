<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: application/json');

require("../conexion.php");
$con = retornarConexion();

$query = "select id, email,rol,estado from usuarios";
if($_GET['rol']!= 'all'){
$query .=" where rol='$_GET[rol]'";
}

$result = mysqli_query($con, $query);
$vec=array();
while ($reg = mysqli_fetch_object($result)) {
    $vec[] = $reg;
}
echo json_encode($vec) ;
   