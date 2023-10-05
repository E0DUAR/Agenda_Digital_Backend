<?php
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PUT, HEAD, OPTIONS,DELETE');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header('Content-Type: application/json');
    
    if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
       
        require("../conexion.php");
        $link = retornarConexion();

        $data = mysqli_query($link, "select email from docentes where id = $_GET[id]");
        $email = $data->fetch_object()->email;

        mysqli_query($link, "delete from docentes where id = $_GET[id]");
        mysqli_query($link, "delete from usuarios where email = '$email' ");
        
        echo json_encode(array('result'=>'OK'));
    }