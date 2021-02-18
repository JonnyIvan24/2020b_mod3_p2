<?php

include('../../conf.php');

$producto_id = $_GET['id'];

$tiendas = array_key_exists('tiendas', $_POST) ? $_POST['tiendas'] : [];

if($conexion){
    
    foreach ($tiendas as $tienda_id){

        $has_tienda = "SELECT * FROM producto_has_tienda WHERE tienda_id = $tienda_id AND producto_id = $producto_id";
        $producto_has_tienda = mysqli_query($conexion, $has_tienda);
        $producto_has_tienda = mysqli_fetch_object($producto_has_tienda);

        if(!$producto_has_tienda){
            $actualizar = "INSERT INTO producto_has_tienda (producto_id, tienda_id) 
            VALUES ($producto_id, $tienda_id)";
            mysqli_query($conexion,$actualizar);
        }
    }

    $consulta_producto_has_tienda = "SELECT * FROM producto_has_tienda WHERE producto_id = $producto_id";
    $productos_has_tiendas =  mysqli_query($conexion, $consulta_producto_has_tienda);

    while ($producto_has_tienda = mysqli_fetch_assoc($productos_has_tiendas)){

        if (!in_array($producto_has_tienda['tienda_id'], $tiendas)){
            $eliminar_tienda = "DELETE FROM producto_has_tienda WHERE tienda_id = ".$producto_has_tienda['tienda_id']." AND 
                producto_id = $producto_id";
            mysqli_query($conexion, $eliminar_tienda);
        }
    }

    header('Location: ../../../views/productos/editar_producto.php?id='.$producto_id);

}else{
    echo "Error al conectarme".mysqli_error($conexion);
}
