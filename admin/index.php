<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ecommerce</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>Ecommerce</b>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Registrate para iniciar sesion</p>

<?php
  If(isset($_REQUEST['Login'])){ //Para saber si se presiono el boton de registrarse
    //Iniciamos sesion
    session_start();

    //Aqui esperamos que nos de un dato o sera un campo vacio
    $email=$_REQUEST['Email']??'';
    $Password=$_REQUEST['Password']??'';
    $Password=md5($Password); //Se encripta 

    //Conexion con la bd
    include_once "database.php";
    $con = mysqli_connect($host, $user, $pass, $db);
    $query="SELECT Id, Email, Nombre FROM admin WHERE Email='".$email."' and Password='".$Password."' ";
    $res=mysqli_query($con, $query);//Obtenemos el resultado del query
    $row=mysqli_fetch_assoc($res);//Obtenemos el registro de la peticion

    //Si hay datos trabajamos en la sesion 
    if ($row) {
      $_SESSION['Id']=$row['Id'];
      $_SESSION['Email']=$row['Email'];
      $_SESSION['Nombre']=$row['Nombre'];
      //Si si hay datos redireccionamos al panel 
      header("location: panel.php");
    }
    else {
      ?>
        <div class="alert alert-danger" role="alert">
          ERROR DE INICIO
        </div>
      <?php
    }

  }
?>

      <form method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Correo" name="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Contraseña" name="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block": name="Login"> Registrate</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
