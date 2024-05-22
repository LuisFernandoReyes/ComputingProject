<?php
    $servidor = "localhost";
    $usuario = "root";
    $pass = "";
    $bdname = "esp32_mc_db";

    $conexion = new mysqli($servidor,$usuario,$pass, $bdname);
    if($conexion->connect_error){
        die("Error de conexion:".$conexion->connect_error);

    }
?>