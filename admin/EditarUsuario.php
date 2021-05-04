<?php
include_once "database.php";
$con = mysqli_connect($host, $user, $pass, $db);
if (isset($_REQUEST['Guardar'])) {

    $email = mysqli_real_escape_string($con, $_REQUEST['email'] ?? '');
    $pass = md5(mysqli_real_escape_string($con, $_REQUEST['contra'] ?? ''));
    $nombre = mysqli_real_escape_string($con, $_REQUEST['nombre'] ?? '');
    $id = mysqli_real_escape_string($con, $_REQUEST['Id'] ?? '');

    $query = "UPDATE admin SET
        Email='" . $email . "', Password='" . $pass . "',Nombre='" . $nombre . "'
        where Id='".$id."';
        ";
    $res = mysqli_query($con, $query);
    if ($res) {
        echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=Usuarios&mensaje=Usuario '.$nombre.' editado exitosamente" />  ';
    } else {
?>
        <div class="alert alert-danger" role="alert">
            Error al crear usuario <?php echo mysqli_error($con); ?>
        </div>
<?php
    }
}
$id= mysqli_real_escape_string($con,$_REQUEST['Id']??'');
$query="SELECT Id,Email,Password,Nombre from admin where Id='".$id."'; ";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_assoc($res);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar Usuario</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Formulario para editar datos del administrador </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="panel.php?modulo=EditarUsuario" method="post">
                            <div class="form-group">
                                <label>Correo Electronico</label>
                                <input type="email" name="email" class="form-control" value="<?php echo $row['Email'] ?>" required="required" >
                            </div>
                            <div class="form-group">
                                <label>Contraseña</label>
                                <input type="password" name="contra" class="form-control"  required="required" >
                            </div>
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" name="nombre" class="form-control" value="<?php echo $row['Nombre'] ?>"  required="required" >
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?php echo $row['Id'] ?>" >
                                <button type="submit" class="btn btn-primary" name="Guardar">Guardar</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>