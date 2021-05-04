<!DOCTYPE html>
<html>
  <?php
    session_start();
    session_regenerate_id(true); 
    if( isset($_REQUEST['sesion']) && $_REQUEST['sesion']=="cerrar" ) //PARA CERRAR LA SESION 
    {
      session_destroy();//Aunque se regrese ya no puede entrar 
      header("location: index.php"); //Nos manda al area de login 
    }

    if (isset($_SESSION['Id'])==false) {
      header("location: index.php");
    }

    $modulo=$_REQUEST['modulo']??'';
  ?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Floreria Zantedeschia</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <!-- DataTables-->
  <!--<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">-->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.0.3/css/dataTables.dateTime.min.css">
  <link rel="stylesheet" href="css/editor.dataTables.min.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Messages Dropdown Menu -->
        <a class="nav-link" href="panel.php?modulo=EditarUsuario&Id=<?php echo $_SESSION['Id']; ?>">
          <i class="far fa-user"></i>
        </a>
        <a class="nav-link text-danger" href="panel.php?modulo=&sesion=cerrar" title="Cerrar sesion">
            <i class="fas fa-door-closed"></i>
        </a>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="dist/img/logond.jpg" alt="Zantedeschia Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Floreria Zantesdeschia</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> <?php echo $_SESSION['Nombre']; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class= "fa fa-shopping-cart nav-icon" aria-hidden="true" ></i>
              <p>
                Zantedeschia
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="panel.php?modulo=Estadisticas" class="nav-link <?php echo ($modulo=="Estadisticas"||$modulo=="")? "active": " "; ?>">
                  <i class="fas fa-chart-bar nav-icon"  aria-hidden="true"></i>
                  <p>Estadisticas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="panel.php?modulo=Usuarios" class="nav-link <?php echo ($modulo=="Usuarios"||$modulo=="CrearUsuario")? "active": " "; ?> ">
                  <i class="far fa-user nav-icon"  aria-hidden="true" ></i>
                  <p>Usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="panel.php?modulo=Productos" class="nav-link <?php echo ($modulo=="Productos"||$modulo=="")? "active": " "; ?>">
                  <i class="fa fa-shopping-bag  nav-icon"  aria-hidden="true" ></i>
                  <p>Productos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="panel.php?modulo=Ventas" class="nav-link <?php echo ($modulo=="Ventas"||$modulo=="")? "active": " "; ?> ">
                  <i class="fa fa-table nav-icon"  aria-hidden="true" ></i>
                  <p>Ventas</p>
                </a>
              </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
    <?php
      if (isset($_REQUEST['mensaje']) ) 
      {
        ?>
          <div class="alert alert-primary alert-dismissible fade show float-right" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
            </button>
            <?php echo $_REQUEST['mensaje'] ?>
          </div>
        <?php
      }
//MODULOS DE LAS PAGINAS QUE USA EL ADMIN
      if($modulo=="Estadisticas" || $modulo=="")
      {
        include_once "Estadisticas.php";
      }
      if($modulo=="Usuarios")
      {
        include_once "Usuarios.php";
      }
      if($modulo=="Productos")
      {
        include_once "Productos.php";
      }
      if($modulo=="Ventas")
      {
        include_once "Ventas.php";
      }
      if ($modulo=="CrearUsuario") 
      {
        include_once "CrearUsuario.php";
      }
      if ($modulo=="EditarUsuario") 
      {
        include_once "EditarUsuario.php";
      }
      if ($modulo=="Productos") 
      {
        include_once "Productos.php";
      }
    ?>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
  <!-- DataTables  & Plugins -->
  <!--<script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script> 
  <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="plugins/jszip/jszip.min.js"></script>
  <script src="plugins/pdfmake/pdfmake.min.js"></script>
  <script src="plugins/pdfmake/vfs_fonts.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>-->

  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
  <script src="https://cdn.datatables.net/datetime/1.0.3/js/dataTables.dateTime.min.js"></script>
  <script src="js/dataTables.editor.min.js"></script>

<script>
  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });

  //Aqui es para la tabla editable de productos
  editor = new $.fn.dataTable.Editor( {
        ajax: "controllers/productos.php",
        table: "#TablaProductos",
        fields: [ {
                label: "Nombre:",
                name: "nombre"
            }, {
                label: "Descripcion:",
                name: "descripcion"
            }, {
                label: "Precio:",
                name: "precio"
            }, {
                label: "Existencia:",
                name: "existencia"
            }
        ]
    } );
 
    $('#TablaProductos').DataTable( {
        dom: "Bfrtip",
        ajax: "controllers/productos.php",
        columns: [
            { data: "nombre" },
            { data: "descripcion" },
            { data: "precio", render: $.fn.dataTable.render.number( ',', '.', 0, '$' ) },
            { data: "existencia" }
        ],
        select: true,
        buttons: [
            { extend: "create", editor: editor },
            { extend: "edit",   editor: editor },
            { extend: "remove", editor: editor }
        ]
    } );
</script>

<script>
  $(document).ready(function () {
    $(".borrar").click(function (e) { 
      e.preventDefault();
      var res=confirm("Realmente te quieres borrar este usuario?");
      if(res==true){
        var link=$(this).attr("href");
        window.location=link;
      }

    });
  });
</script>

</body>
</html>
