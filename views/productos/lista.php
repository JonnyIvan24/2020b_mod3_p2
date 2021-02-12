<?php
include('../../layout/header.php');
include('../../layout/sidebar.php');
include('../../layout/navbar.php');
include('../../src/conf.php');

if($conexion){
  $consulta = "SELECT * FROM producto";
  $datos = mysqli_query($conexion,$consulta);
}else{
  echo "No me pude conectar ".mysqli_error($conexion);
}

?>
      <div class="content">
        <div class="container-fluid">

          <!-- your content here -->

          <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon card-header-primary">
                      <div class="card-icon">
                        <i class="material-icons">list</i>
                      </div>
                    </div>
                    <div class="card-body">
                      <h3>Lista de productos</h3>

                      <table class="table">
                          <thead>
                              <tr>
                                  <th>Nombre</th>
                                  <th>Descripción</th>
                                  <th>Precio</th>
                                  <th>Stock</th>
                                  <th>Acciones</th>
                              </tr>
                          </thead>
                          <tbody>
                          <?php
                          while($fila = mysqli_fetch_assoc($datos)){
                            echo "
                            <tr>
                              <td>".$fila["nombre"]."</td>
                              <td>".$fila["descripcion"]."</td>
                              <td>".$fila["precio"]."</td>
                              <td>".$fila["stock"]."</td>
                              <td><a href='delete.php?id=".$fila['id']."'>Eliminar</a>
                              <a href='editar_producto.php?id=".$fila['id']."'>Editar</a></td>
                            </tr>";
                          }
                          ?>
                              
                          </tbody>
                      </table>
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
