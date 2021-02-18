<?php
include('../../layout/header.php');
include('../../layout/sidebar.php');
include('../../layout/navbar.php');
include('../../src/conf.php');

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
                      <h3>Guardar un nueva tienda</h3>

                      <form action="../../src/servicios/tiendas/crear.php" method="POST">

                          <div class="for-row">
                              <div class="form-group">
                                  <label for="nombre">Nombre:</label>
                                  <input type="text" name="nombre" class="form-control">
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
