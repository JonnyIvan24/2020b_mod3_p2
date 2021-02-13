<?php
include('../../conf.php');

$id = $_GET['id'];

if ($conexion){
    $delete = "DELETE FROM producto WHERE id=$id";
    mysqli_query($conexion, $delete);
    header('Location: ../../../views/productos/lista.php');
}else{
    echo "Error al conectarme".mysqli_error($conexion);
}


?>