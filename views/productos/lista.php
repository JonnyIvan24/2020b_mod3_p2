<?php
include('../../layout/header.php');
include('../../layout/sidebar.php');
include('../../layout/navbar.php');
include('../../src/conf.php');

if($conexion){
  $consulta = "SELECT producto.*, categoria.nombre as categoria_nombre FROM producto INNER JOIN categoria ON categoria.id = producto.categoria_id";
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
                                  <th>Categoría</th>
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
                              <td>".$fila["categoria_nombre"]."</td>
                              <td><button class='btn btn-danger' onclick='eliminar(".$fila["id"].")'>Eliminar</button>
                              <a class='btn btn-success' href='editar_producto.php?id=".$fila['id']."'>Editar</a></td>
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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>

          function eliminar(id){
            Swal.fire({
            title: '¿Está seguro ded eliminar el producto?',
            text: "Esta acción es irreversible",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = "../../src/servicios/productos/eliminar.php?id="+id;
              }
            })
          }
          
        </script>
<?php
include('../../layout/footer.php');
?>
