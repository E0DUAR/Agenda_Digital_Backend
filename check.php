<?php
require("conexion.php");
$conn= retornarConexion();

$data = mysqli_query($conn,"select now() as now ");
echo $data->fetch_object()->now;

mysqli_free_result($data);

?>