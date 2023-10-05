<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: application/json');

require("../conexion.php");
$con = retornarConexion();

$result = mysqli_query($con, "select * from actividades where id='$_GET[id]'");
$data=mysqli_fetch_object($result);
    
echo json_encode($data) ;
   