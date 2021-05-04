<?php
  include_once "database.php"; //Conexion con la bd
  $con = mysqli_connect($host, $user, $pass, $db);
  if (isset($_REQUEST['IdBorrar'])) 
  {
    $id=mysqli_real_escape_string($con, $_REQUEST['IdBorrar']??'');
    $query="DELETE from admin where Id ='".$id."';";
    $res = mysqli_query($con, $query);//Obtenemos el resultado del query
    if ($res) {
      ?>
        <div class="alert alert-warning float-right" role="alert">
          Usuario borrado con exito
        </div>
      <?php
    }else {
      ?>
      <div class="alert alert-danger float-right" role="alert">
        Error al borrar <?php echo mysqli_error($con); ?>
      </div>
      <?php
    }
  }
?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administradores</h1>
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
                <h3 class="card-title">Tabla de visualizacion de los administradores registrados </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Email</th>
                      <th>Acciones
                        <a href="panel.php?modulo=CrearUsuario"><i class="fa fa-plus " aria-hidden="true"></i></a>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $query="SELECT Id, Email, Nombre FROM admin;";
                      $res=mysqli_query($con, $query);//Obtenemos el resultado del query
                      while ($row=mysqli_fetch_assoc($res)) {//Mientras el row contenga registros
                        ?>
                          <tr>
                            <td><?php echo $row['Nombre'];?></td>
                            <td><?php echo $row['Email'];?></td>
                            <td>
                              <a href="panel.php?modulo=EditarUsuario&Id=<?php echo $row['Id']?>" style="margin-right: 5px;"> <i class="fas fa-edit" ></i> </a><!--Puede ser Perfil en lugar de usuario-->
                              <a href="panel.php?modulo=Usuarios&IdBorrar=<?php echo $row['Id'] ?>" class="text-danger borrar"> <i class="fas fa-trash"></i> </a>
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