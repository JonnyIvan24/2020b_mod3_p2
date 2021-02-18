<?php
include('../../layout/header.php');
include('../../layout/sidebar.php');
include('../../layout/navbar.php');
include('../../src/conf.php');

$id_producto = $_GET['id'];

if($conexion){
    $consulta = "SELECT * FROM categoria";
    $datos_categorias = mysqli_query($conexion,$consulta);
    
    $consulta = "SELECT * FROM producto WHERE id = ".$id_producto;
    $datos_producto = mysqli_query($conexion, $consulta);
    $producto = mysqli_fetch_object($datos_producto);

    $consulta = "SELECT * FROM tienda";
    $datos_tiendas = mysqli_query($conexion,$consulta);

    $consulta_producto_has_tienda = "SELECT * FROM producto_has_tienda WHERE producto_has_tienda.producto_id = ".$id_producto;
    $datos_producto_tiendas =  mysqli_query($conexion,$consulta_producto_has_tienda);

}else{
    echo "No me pude conectar ".mysqli_error($conexion);
}

$productos_has_tiendas = [];

while ($item = mysqli_fetch_assoc($datos_producto_tiendas)){
    $productos_has_tiendas[] = $item;
}

?>

<div class="content">
    <div class="container-fluid">

        <!-- your content here -->

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-icon card-header-primary">
                        <div class="card-icon">
                            <i class="material-icons">edit</i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3>Editar de producto</h3>

                        <form action="<?php echo "../../src/servicios/productos/editar.php?id=".$producto->id?>"
                        method="POST">

                            <div class="for-row">
                                <div class="form-group">
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" name="nombre" class="form-control"
                                    value="<?php echo $producto->nombre; ?>"
                                    >
                                </div>
                            </div>

                            <div class="for-row">
                                <div class="form-group">
                                    <label for="descripcion">Descripcion:</label>
                                    <input type="text" name="descripcion" class="form-control"
                                    value="<?php echo $producto->descripcion; ?>"
                                    >
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="categoria">Categoría</label>
                                    <select class="form-control" name="categoria" >
                                        <?php
                                        while ($categoria = mysqli_fetch_assoc($datos_categorias)){
                                            if ($producto->categoria_id === $categoria['id']){
                                                echo '<option value="'.$categoria['id'].'" selected>'.$categoria['nombre'].'</option>';
                                            } else {
                                                echo '<option value="'.$categoria['id'].'">'.$categoria['nombre'].'</option>';
                                            }                                        
                                        }
                                        ?>
                                    </select>
                                </div>
                                
                                <div class="form-group col-md-4">
                                    <label for="precio">Precio:</label>
                                    <input class="form-control" type="text" name="precio"
                                    value="<?php echo $producto->precio; ?>"
                                    >
                                </div>

                                <div class="form-group col-md-2">
                                    <label for="precio">Stock:</label>
                                    <input class="form-control" type="number" name="stock" placeholder="stock"
                                    value="<?php echo $producto->stock; ?>"
                                    >
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                        
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-icon card-header-primary">
                        <div class="card-icon">
                            <i class="material-icons">store</i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3>Tiendas a la que pertenece</h3>

                        <form action="../../src/servicios/productos/tiendas.php?id=<?php echo $producto->id ?>" method="POST">

                            <div class="for-row">
                                <?php
                                
                                    while($tienda = mysqli_fetch_assoc($datos_tiendas)){
                                        
                                        $bandera = false;
                                        foreach ($productos_has_tiendas as $producto_has_tienda) {
                                            if ($tienda['id'] === $producto_has_tienda['tienda_id']) {
                                                echo '
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" name="tiendas[]"
                                                        value="'.$tienda['id'].'" id="'.$tienda['id'].'" 
                                                        checked>
                                                        '.$tienda['nombre'].'
                                                        <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>';
                                                $bandera = true;
                                                break;
                                            }
                            
                                        }

                                        if ($bandera){
                                            continue;
                                        }

                                        echo '
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" name="tiendas[]" type="checkbox" 
                                                value="'.$tienda['id'].'" id="'.$tienda['id'].'">
                                                '.$tienda['nombre'].'
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>';
                                    }

                                ?>
                            </div>

                            <button type="submit" class="btn btn-primary">Actualizar</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
            
    <!-- End content -->
    </div>
</div>

<?php
include('../../layout/footer.php');
?>