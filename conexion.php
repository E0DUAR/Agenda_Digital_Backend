<?php

function retornarConexion() {
  $con = mysqli_connect("localhost", "root", "", "agenda");

  // Verificar si hay un error en la conexión
  if (mysqli_connect_errno()) {
    $error_message = "Error de conexión: " . mysqli_connect_error();
    error_log($error_message); // Registra el mensaje de error en el registro de errores de PHP
    return false; // Retorna false para indicar que hubo un error
  } else {
    //echo "Conexión exitosa";
    return $con; // Retorna la conexión en caso de éxito
  }
}

// Ejemplo de uso
$conexion = retornarConexion();

if ($conexion === false) {
  echo "Hubo un error en la conexión. Por favor, revisa el registro de errores.";
} else {
  // Aquí puedes realizar operaciones con la conexión exitosa
}











/*function retornarConexion() {
  $con=mysqli_connect("localhost","root","","agenda");
  return $con;
}
?>*/
?>
