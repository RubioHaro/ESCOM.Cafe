<?php
    $servidor="localhost";
    $nombreBD="proyectotw";
    $usuario="root";
    $pass="";
    $conexion=new mysqli($servidor,$usuario,$pass,$nombreBD);
    if($conexion -> connect_error){
        die("Error al conectar");
    }

?>