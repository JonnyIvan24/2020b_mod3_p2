<?php
include('../../layout/header.php');
include('../../layout/sidebar.php');
include('../../layout/navbar.php');
include('../../src/conf.php');

if($conexion){
  $consulta = "SELECT * FROM categoria";
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
                      <h3>Guardar un nuevo producto</h3>

                      <form action="../../src/servicios/productos/crear_producto.php" method="POST">

                          <div class="for-row">
                              <div class="form-group">
                                  <label for="nombre">Nombre:</label>
                                  <input type="text" name="nombre" class="form-control">
                              </div>
                          </div>

                          <div class="for-row">
                              <div class="form-group">
                                  <label for="descripcion">Descripcion:</label>
                                  <input type="text" name="descripcion" class="form-control">
                              </div>
                          </div>
                          
                          <div class="form-row">
                              <div class="form-group col-md-6">
                                  <label for="categoria">Categoría</label>
                                  <select class="form-control" name="categoria" >
                                      <option value="">Selecciona una categoría...</option>
                                      <?php
                                      while ($fila = mysqli_fetch_assoc($datos)){
                                        echo '<option value="'.$fila['id'].'">'.$fila['nombre'].'</option>';
                                      }
                                      ?>
                                  </select>
                                </div>
                              
                              <div class="form-group col-md-4">
                                  <label for="precio">Precio:</label>
                                  <input class="form-control" type="text" name="precio">
                              </div>
                  
                              <div class="form-group col-md-2">
                                  <label for="precio">Stock:</label>
                                  <input class="form-control" type="number" name="stock" placeholder="stock">
                              </div>
                          </div>

                          <button type="submit" class="btn btn-primary">Guardar</button>

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
