<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header('Content-Type: application/json');
    
    if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
       
        require("../conexion.php");
        $link = retornarConexion();

        mysqli_query($link, "delete from usuarios where id = $_GET[id]");

        echo json_encode(array('result' => 'OK'));
    }