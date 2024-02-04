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

// Filter the excel data
function filterData(&$str){
  $str = str_replace("/\t/", "\\t", $str);
  $str = str_replace("/\r?\n/", "\\n", $str);
  if(strstr($str, '"')){ $str = '"' . str_replace('"', '""', $str) . '"'; }
}

function exportar($rows) {
  if(!empty($rows)){
    $filename = "reporte_".date('Y-m-d').".xls";
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=".$filename);
    $mostrar_columnas = false;
    foreach($rows as $row) {
        if(!$mostrar_columnas) {
            echo implode("\t", array_keys($row))."\n";
            $mostrar_columnas = true;
        }
        array_walk($row,'filterData');
        echo implode("\t", array_values($row))."\n";
    }
  }else{
      echo 'No hay datos para exportar';
  }
}

// Ejemplo de uso
$conexion = retornarConexion();

if ($conexion === false) {
  echo "Hubo un error en la conexión. Por favor, revisa el registro de errores.";
} else {
  // Aquí puedes realizar operaciones con la conexión exitosa
}



?>
