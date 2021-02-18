<?php
include "../../conf.php";

$nombre = $_POST['nombre'];
session_start();
if($conexion){
    $consulta = "INSERT INTO tienda 
    (nombre)
    VALUES ('$nombre')";
    if(mysqli_query($conexion,$consulta)){
        echo "Se insertó exitosamente";
        header('Location: ../../../views/tiendas/lista.php');
        session_destroy();
    }else{
        echo $_SESSION['error'] = mysqli_error($conexion);
        header('Location: ../../../views/tiendas/crear.php');
    }
}else{
    echo "Error al conectarme".mysqli_error($conexion);
}


?>