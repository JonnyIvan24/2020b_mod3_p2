<?php

include('../../conf.php');

$id = $_GET['id'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];
$categoria = $_POST['categoria'];
session_start();
if($conexion){
    $actualizar = "UPDATE producto SET nombre='$nombre', descripcion='$descripcion',
        precio=$precio, stock=$stock, categoria_id=$categoria WHERE id=$id";
    if(mysqli_query($conexion,$actualizar)){
        echo "Se actualizó exitosamente";
        header('Location: ../../../views/productos/lista.php');
        session_destroy();
    }else{
        echo $_SESSION['error'] = mysqli_error($conexion);
        header('Location: ../../../views/productos/editar_producto.php');
    }
}else{
    echo "Error al conectarme".mysqli_error($conexion);
}

?>