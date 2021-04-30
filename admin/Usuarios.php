 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Clientes</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabla de visualizacion de los clientes registrados </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Email</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      //Conexion con la bd
                      include_once "database.php";
                      $con = mysqli_connect($host, $user, $pass, $db);
                      $query="SELECT Id, Email, Nombre FROM admin;"
                      $res=mysqli_query($con, $query);//Obtenemos el resultado del query
                      while ($row=mysqli_fetch_assoc($res);) {//Mientras el row contenga registros
                        ?>
                          <tr>
                            <td><?php echo $row['Nombre'];?></td>
                            <td><?php echo $row['Email'];?></td>
                            <td>

                            </td>
                          </tr>
                        <?php
                      }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>